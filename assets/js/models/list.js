var app = app || {};

$(function () {
    app.List = Backbone.Model.extend({
        urlRoot: $('#site-url').val() + "/wishlist/list",
        idAttribute: "listId"
    });

});