var app = app || {};

$(function () {
    app.EditItemView = Backbone.View.extend({
        template: _.template($('#editItemTemplate').html()),
        model: app.Item,
        initialize: function () {
            this.render();
        },
        events: {
            "click #edit-item": "editItem"
        },
        editItem: function (event) {
            var title = $("#title").val();
            var url = $("#url").val();
            var price = $("#price").val();
            var priority = $("#priority").val();

            this.model.set("title", title);
            this.model.set("url", url);
            this.model.set("price", price);
            this.model.set("priority", priority);

            this.model.save();
            $(this.el).modal('toggle');
        },
        closeModal: function () {
            this.remove();
        },
        render: function () {
            var modelJSON = this.model.toJSON();
            this.el.id = "#editItemModal";
            this.el.className = "modal fade";
            var editItemTemplate = this.template(modelJSON);
            $("#wishlist").append($(this.el).append(editItemTemplate));

            $("#editItemModal input[name=title]").val(this.model.get('title'));
            $("#editItemModal input[name=url]").val(this.model.get('url'));
            $("#editItemModal input[name=price]").val(this.model.get('price'));
            $("#priority option[value='" + this.model.get('priority') + "']").attr("selected", "selected");

            $(this.el).modal('toggle');
            $(this.el).on('hidden.bs.modal', this.closeModal);

            return this;
        }
    });
});