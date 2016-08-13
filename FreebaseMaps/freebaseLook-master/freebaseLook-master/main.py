#!/usr/bin/env python

import webapp2
import json
import urllib

class MainHandler(webapp2.RequestHandler):

    def get(self):

        api_key = "AIzaSyBU6j0MR6RoA7qlwGz_Is5pEcr_pg7EATI"
        query = 'dog'
        service_url = 'https://www.googleapis.com/freebase/v1/search'
        params = {
            'query': query,
            'key': api_key
        }
        url = service_url + '?' + urllib.urlencode(params)
        response = json.loads(urllib.urlopen(url).read())
        r2 = urllib.urlopen(url).read()
        jsonPrint = json.dumps(r2)

        #self.response.write(jsonPrint)
        #self.response.write( str( response ) )
        self.response.write(urllib.urlopen(url).read())

app = webapp2.WSGIApplication([
    ('/', MainHandler)
], debug=True)
