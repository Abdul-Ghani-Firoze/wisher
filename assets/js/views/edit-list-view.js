var app = app || {};

$(function () {
    app.EditListView = Backbone.View.extend({
        template: _.template($('#editListTemplate').html()),
        model: app.List,
        initialize: function () {
            this.render();
        },
        events: {
            "click #edit-list": "editList"
        },
        editList: function () {
            var name = $("#wishlist-name").val();
            var description = $("#wishlist-description").val();

            this.model.set("name", name);
            this.model.set("description", description);

            this.model.save();
            $(this.el).modal('toggle');
        },
        closeModal: function () {
            this.remove();
        },
        render: function () {
            var modelJSON = this.model.toJSON();
            this.el.id = "#editListModal";
            this.el.className = "modal fade";
            var editListTemplate = this.template(modelJSON);
            $("#wishlist").append($(this.el).append(editListTemplate));

            $(this.el).modal('toggle');
            $(this.el).on('hidden.bs.modal', this.closeModal);

            return this;
        }
    });
});