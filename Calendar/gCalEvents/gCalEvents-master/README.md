gCalEvents
==========

A jQuery plugin that parses a Google Calendar Atom feed, with options. 

#### What makes it different?

Most plugins of this type display the date of an events by creating date object _on the client_. Thus, date and time are cast in the _current timezone_ of the client.  This behavior is not always as desired. 

Instead this plugin allows the user to set the timezone in the feed request, and that timezone is retained.


Usage
-----

Include the appropriate scrips on the page.

````html
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery.gcal-events.min.js"></script>
````

#### Add a container on your HTML page for the calendar events

````html
<div id="calendarEvents"></div>
```` 

#### Prepare your calendar

The Calendar ID can be found by clicking on "Calendar settings" next to the calendar you wish to display. The Calendar ID is then shown beside "Calendar Address".

Make sure that your calendar has public permissions.

#### Call the plugin

**Basic call.**

Add your calendar's ID. Without any calendar, a calendar of Jewish holidays will display.

````javascript
$('#calendarEvents').gCalEvents({
	CalendarId:'john.doe@gmail.com'
});
````

**With options.**
````javascript
$('#calendarEvents').gCalEvents({
	CalendarId: 'john.doe@gmail.com',
	ShowTimes: true,
	ShowDescription: true,
	NoEventsLang: 'There are currently no events scheduled.',
	TimeZone: 'America/New_York',
	FutureEvents: true,
	MaxEvents: 5,
	DateFormat: 'LongDate'
});
````

### Options

**CalendarId** - The ID of your calendar. ````johndoe@gmail.com````  
**ShowTimes** - Display the time. ````true```` or ````false```` Default is ````false````.  
**ShowDescription** Show the event description. ````true```` or ````false```` Default is ````false````.  
**NoEventsLang** - Text to display when there are no events or there is a feed error.  
**TimeZone** - Text from the [list of tz database time zones](http://en.wikipedia.org/wiki/List_of_IANA_time_zones). Example "America/Los_Angeles"  
**FutureEvents** - Display events in the future. ````true```` or ````false````  
**MaxEvents** - The maximum desired number of events to return. The default is 100.
**NumberOfEvents** - The number of events to display. Leaving this parameter out will show all events.  
**DateFormat** - Control the date and time formats.  
* ````ShortTime```` - 4:05 PM                         
* ````ShortDate```` - 3/9/2008
* ````LongDate```` - Sunday, March 09, 2008
* ````LongDate+ShortTime```` - Sunday, March 09, 2008 4:05 PM
* ````ShortDate+ShortTime```` - 3/9/2008 4:05 PM
* ````DayMonth```` - Sun, March 09
* ````MonthDay```` - March 09                        
* ````YearMonth```` - March 2008

### Styling

Depending on options, the markup sent to browser will look like this. Style to taste.

````html
<div class="entry">
	<h3>April 5, 2014</h3>
	<h2>Dinner with Andre</h2>
	<h3>5:30 PM - 9:00 PM</h3>
	<div class="desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
	sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
	<p class="location">
		<span>Location: </span>
		<span>Cosmo's Diner</span>
	</p>
</div>
````

### Limitations

Currently, the plugin does not handle recurring events. This will be a future enhancement.

Credits
-----

Authored by [Michael McGlynn](http://www.reignitioninc.com).
Invaluable testing and contribution by Carrie Cannon.


