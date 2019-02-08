var app = app || {};

$(function () {
    var ItemList = Backbone.Collection.extend({
        model: app.Item,
        url: $('#site-url').val() + "/wishlist/items",
        comparator: 'priority'
    });

    app.ItemList = new ItemList();
});