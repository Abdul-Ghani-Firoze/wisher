$(function () {
    app.Item = Backbone.Model.extend({
        defaults: {
            itemId: null,
            title: null,
            url: null,
            price: null,
            priority: null,
            listId: null
        },
        idAttribute: "itemId",
        urlRoot: $('#site-url').val() + "wishlist/item"
    });
});