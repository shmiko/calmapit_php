/**
 * @fileoverview Library for rendering cards.
 * Depends on http://beebole.com/pure js library.
 *//**
 * Namespace.
 */var cards={};cards.MAPPING_DIRECTIVE={".action":"actionText",".action@href":"actionUrl",".description":"description",".image@src":"image",".notableFor":"notableFor",".name":"name",".namedAfter a":"namedAfterText",".namedAfter a@href":"namedAfterUrl",".namedAfter@display":"namedAfterDisplay",".films a":{"film<-films":{".":"film.text"}}};cards.isCardDisplayed=function(e){return!!$('.card[data-mid="'+e+'"]').length};cards.displayCard=function(e){console.log(e);$(".card").show();$(".card").attr("data-mid",e.id);var t={name:e.property["/type/object/name"].values[0].value,description:e.property["/common/topic/description"].values[0].text,notableFor:"",image:"images/none.gif",actionUrl:"",actionText:""};e.property["/common/topic/notable_for"]&&(t.notableFor=e.property["/common/topic/notable_for"].values[0].text);e.property["/common/topic/image"]&&(t.image="https://www.googleapis.com/freebase/v1/image/"+e.property["/common/topic/image"].values[0].id+"?maxwidth=260");if(e.property["/common/topic/official_website"]){t.actionUrl=e.property["/common/topic/official_website"].values[0].value;t.actionText="Visit official website"}if(fbmap.category=="/symbols/namesake"&&e.property["/symbols/namesake/named_after"]){t.namedAfterText=e.property["/symbols/namesake/named_after"].values[0].text;t.namedAfterUrl="http://freebase.com"+e.property["/symbols/namesake/named_after"].values[0].id;t.namedAfterDisplay=!0}if(fbmap.category=="/film/film_location"&&e.property["/film/film_subject/films"]){t.films=[];for(var n=0,r;r=e.property["/film/film_subject/films"][n];n++)t.films.push({text:r.text,url:"http://freebase.com"+r.id});t.featuredInFilmsText=e.property["/film/film_location/featured_in_films"].values[0].text;t.featuredInFilmsUrl="http://freebase.com"+e.property["/film/film_location/featured_in_films"].values[0].id;t.featuredInFilmsDisplay=!0}$("div.card").render(t,cards.MAPPING_DIRECTIVE)};