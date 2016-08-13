/*!
 * PLACES JS - Leaflet Extend MBTiles
 */

L.TileLayer.MBTiles = L.TileLayer.extend(
{
	mbTilesDB: null,

	initialize: function(url, options, db)
	{
		this.mbTilesDB = db;
		L.Util.setOptions(this, options);
	},

	getTileUrl: function (tilePoint, zoom, tile)
	{
		var z = this._getOffsetZoom(zoom);
		var x = tilePoint.x;
		var y = tilePoint.y;
		var base64Prefix = 'data:image/gif;base64,';

		this.mbTilesDB.executeSql("SELECT tile_data FROM images INNER JOIN map ON images.tile_id = map.tile_id WHERE zoom_level = " + z + " AND tile_column = " + x + " AND tile_row = " + y, function (res) {
			tile.src = base64Prefix + res.rows[0].tile_data;
		}, function (er) {
			console.log('error with executeSql', er);
		});
	},

	_loadTile: function (tile, tilePoint, zoom)
	{
		tile._layer = this;
		tile.onload = this._tileOnLoad;
		tile.onerror = this._tileOnError;
		this.getTileUrl(tilePoint, zoom, tile);
	},

	debug: function()
	{
		console.log("MBTiles");
	}

});