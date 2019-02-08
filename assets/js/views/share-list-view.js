var app = app || {};

$(function () {
    app.ShareListView = Backbone.View.extend({
        template: _.template($('#shareListTemplate').html()),
        model: app.List,
        link: null,
        initialize: function () {
            this.el.id = "#shareItemModal";
            this.el.className = "modal fade";
            this.link = $('#site-url').val() + "wishlist";
            this.render();
        },
        events: {
            "click #copy-link": "copyLink"
        },
        closeModal: function () {
            this.remove();
        },
        copyLink: function (event) {
            $("#wishlist-link").select();
            var successful = document.execCommand('copy');
            if (successful) {
                $("#msg-copied").fadeIn("slow");
                $("#msg-copied").fadeOut(2000);
            }
        },
        render: function () {
            $("#wishlist").append($(this.el).append(this.template));
            $("#wishlist-link").val(this.link + this.model.get('listId'));
            $(this.el).modal('toggle');
            $(this.el).on('hidden.bs.modal', this.closeModal);

            return this;
        }
    });
});