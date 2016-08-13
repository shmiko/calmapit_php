$ = jQuery

$.fn.extend
  birdseye: (options) ->

    map_el = this

    settings =

      # Show animated loading bar while waiting for results.
      loading_indicator: true

      # Initial map lat/lng.
      initial_coordinates: [40, -100]

      # Intial map zoom.
      initial_zoom: 3

      # Leaflet tile layer.
      tile_layer: 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

      # URI of the API we'll be searching.
      request_uri: ''

      # The basic geographical parameters we'll be tacking onto each request.
      # By default, we use a bounding box to constrain our results.
      request_geo_params:
        ne_lat: (map) -> map.getBounds().getNorthEast().lat
        ne_lng: (map) -> map.getBounds().getNorthEast().lng
        sw_lat: (map) -> map.getBounds().getSouthWest().lat
        sw_lng: (map) -> map.getBounds().getSouthWest().lng

      # JSON key for the results array.
      #
      # For example, if our API returns:
      #
      # {
      #    'businesses': [
      #       { name: "Tom's tasty tacos" },
      #       { name: "Adam's apple pies"}
      #    ]
      # }
      #
      # ...then our response_json_key should be 'businesses'.
      response_json_key: 'results'

      # Getter function for the lat/lng of each result.
      # By default, we assume that your object has both a 'latitude' and a 'longitude' property.
      response_params_latlng: (result) ->
        [result.latitude, result.longitude]

      # Getter functions for the pagination.
      # By default, we assume that the response has the following structure:
      #
      # {
      #    meta: {
      #        page: 1,
      #        per_page: 10,
      #        total_pages: 3
      #        count: 28
      #    }
      # }
      #
      response_params_pagination:
        page: (data) -> data.meta.page
        per_page: (data) -> data.meta.per_page
        total_pages: (data) -> data.meta.total_pages
        count: (data) -> data.meta.count

      # Element where we'll be inserting our results.
      results_el: $(".birdseye-results")

      # A function that returns the HTML string for a single result.
      # You're definitely gonna need to customize this one.
      results_template: (key, result) ->
        "
        <div># #{key}: #{result['name']}</div>
        "

      no_results_template: () ->
        "
        <div>Sorry, no results found.</div>
        "

      # Element where we'll be inserting our pagination.
      pagination_el: $(".birdseye-pagination")

      # A function that returns HTML for the pagination controls.
      pagination_template: (pagination) ->
        str = "
              <div class='counts'>
                #{if pagination.count is 0 then "0" else (pagination.page - 1) * pagination.per_page + 1}
                  to
                #{if (pagination.page * pagination.per_page) > pagination.count then pagination.count else (pagination.page * pagination.per_page)}
                of #{pagination.count}
              </div>
              |
              Go to page:
              <ul class='pages'>
              "

        loopTimes = (if (pagination.total_pages - pagination.page) < 5 then (8 - (pagination.total_pages - pagination.page)) else 4)
        p = pagination.page - loopTimes - 1
        for i in [1..loopTimes]
          p = p + 1
          continue if p < 1
          str += "<li><a data-birdseye-role='change-page' data-birdseye-pagenumber='#{p}'>#{p}</a></li>"

        str += "<li>#{pagination.page}</li>"

        loopTimes = (if pagination.page < 5 then (9 - pagination.page) else 4)
        p = pagination.page
        for i in [1..loopTimes]
          p = p + 1
          continue if p > pagination.total_pages
          str += "<li><a data-birdseye-role='change-page' data-birdseye-pagenumber='#{p}'>#{p}</a></li>"

        str += "
                </ul>
                <div class='prev-next'>
                  <a data-birdseye-role='change-page' data-birdseye-pagenumber='#{pagination.page - 1}'>Previous</a>
                  |
                  <a data-birdseye-role='change-page' data-birdseye-pagenumber='#{pagination.page + 1}'>Next</a>
                </div>
                "

        return str

    # Extend our settings with the options passed in the intial birdseye() call.
    settings = $.extend settings, options

    # The search parameters used in the last request.
    current_params = {}

    # The most recently returned pagination data.
    pagination_status = {}

    # An array to hold the markers on our map.
    markers = []

    # Initialize our map and add the tilelayer.
    map = L.map(this[0]).setView(settings.initial_coordinates, settings.initial_zoom)
    L.tileLayer(settings.tile_layer).addTo(map)

    # ====================================================
    # Make the call to your API
    # ----------------------------------------------------
    makeAjaxRequest = (new_params) ->
      request_params = new_params || current_params

      for key, func of settings.request_geo_params
        request_params[key] = func(map)

      current_params = request_params

      if settings.loading_indicator
        map_el.addClass('loading')
        settings.results_el.addClass('loading')

      $.ajax
        url: settings.request_uri + "?" + $.param(request_params)
        type: 'GET'
        dataType: 'json'
        success: (data) ->
          if settings.response_json_key
            processResults(data[settings.response_json_key])
          else
            processResults(data)

          processPagination(data)

          if settings.loading_indicator
            map_el.removeClass('loading')
            settings.results_el.removeClass('loading')

    # ====================================================
    # Process the returned json
    # ----------------------------------------------------
    processResults = (results) ->
      settings.results_el.html('')
      map.removeLayer(marker) for marker in markers

      if results.length > 0
        $(results).each (key, result) ->
          key = key + 1
          new_marker = L.marker settings.response_params_latlng(result),
            icon: new L.NumberedDivIcon
              number: key
          markers.push new_marker.addTo(map)

          settings.results_el.append(settings.results_template(key, result))
      else
        settings.results_el.append(settings.no_results_template())

    # ====================================================
    # Add pagination
    # ----------------------------------------------------
    processPagination = (data) ->
      settings.pagination_el.html('')

      page_params =
        page: settings.response_params_pagination.page(data)
        per_page: settings.response_params_pagination.per_page(data)
        total_pages: settings.response_params_pagination.total_pages(data)
        count: settings.response_params_pagination.count(data)

      settings.pagination_el.append(settings.pagination_template(page_params))
      pagination_status = page_params


    # ====================================================
    # Attach event handlers
    # ----------------------------------------------------
    map.on 'dragend zoomend', () ->
      makeAjaxRequest($.extend current_params, {page: 1})

    $(document).on "click", "[data-birdseye-role=change-page]", () -> exports.change_page($(this).data('birdseye-pagenumber'));


    # ====================================================
    # Define additional functions
    # ----------------------------------------------------
    exports = {}

    exports.set_view = arguments.callee.set_view = (latlng, zoom, updateMap = true) ->
      map.setView(latlng, zoom)
      exports.update() if updateMap

    exports.update = arguments.callee.update = (new_params) =>
      makeAjaxRequest(new_params)

    exports.change_page = arguments.callee.change_page = (page) =>
      return if page > pagination_status.total_pages or page is 0
      makeAjaxRequest($.extend current_params, {page: page})
