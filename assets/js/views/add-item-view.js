var app = app || {};
$(function () {
    app.AddItemView = Backbone.View.extend({
        collection: app.ItemList,
        template: _.template($('#addItemTemplate').html()),
        initialize: function () {
            this.el.id = "#addItemModal";
            this.el.className = "modal fade";
            this.render();
        },
        events: {
            "click #add-item": "addItem"
        },
        addItem: function (event) {
            var title = $("#title").val();
            var url = $("#url").val();
            var price = $("#price").val();
            var priority = $("#priority").val();
            var listId = $("#listId").val();

            var item = new app.Item({title: title, url: url, price: price, priority: priority, listId: listId});
            this.collection.create(item);

            $(this.el).modal('toggle');
        },
        closeModal: function () {
            this.remove();
        },
        render: function () {
            $("#wishlist").append($(this.el).append(this.template));

            $(this.el).modal('toggle');
            $(this.el).on('hidden.bs.modal', this.closeModal);

            return this;
        }
    });
});