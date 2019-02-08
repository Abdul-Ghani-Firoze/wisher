var app = app || {};

$(function () {
    app.ListView = Backbone.View.extend({
        el: "#wishlist",
        template: _.template($('#itemListTemplate').html()),
        model: app.List,
        collection: app.ItemList,
        initialize: function (options) {
            // list 
            this.model = new app.List();
            this.listenTo(this.model, 'change', this.renderList);
            this.model.fetch();

            // items
            this.collection = options.collection;
            this.listenTo(this.collection, 'sync destroy create', this.render);
            this.collection.fetch();
        },
        events: {
            "click #edit-list-btn": "viewEditListModal",
            "click #new-item": "viewAddModal",
            "click [id^=edit-item-btn]": "viewEditModal",
            "click [id^=delete-item-btn]": "deleteItem",
            "click #share-list-btn": "viewShareListModal"

        },
        viewEditListModal: function () {
            new app.EditListView({model: this.model});
        },
        viewAddModal: function () {
            new app.AddItemView({collection: this.collection});
        },
        viewEditModal: function (event) {
            var rowIndex = $(event.currentTarget).attr('id').slice('edit-item-btn'.length) - 1;

            var itemId = $("#wishlist-items tr").eq(rowIndex).attr('id');

            var item = this.collection.get(itemId);

            new app.EditItemView({model: item});

        },
        viewShareListModal: function (event) {
            new app.ShareListView({model: this.model});
        },
        deleteItem: function (event) {
            var itemId = $(event.currentTarget).data("id");
            var item = this.collection.get(itemId);
            item.destroy();
        },
        renderList: function () {
            // display owner email and logout option
            $("#username").html(this.model.get('email'));
            var logoutLink = "<a href='logout' class='nav-link'>Logout</a>";
            $("#logout-holder").html(logoutLink);

            // list
            $("#list-name-holder").empty();
            $("#list-description-holder").empty();

            var elTitle = this.model.get('name');
            var elDescription = this.model.get('description');

            $("#list-name-holder").html(elTitle);
            $("#list-description-holder").html(elDescription);

        },
        render: function (event) {
            // list items
            var listViewEl = $("#wishlist-items");
            listViewEl.empty();
            var index = 0;
            this.collection.sort();
            if (this.collection.length !== 0) {
                _.each(this.collection.models, function (item) {
                    index = index + 1;
                    var itemJSON = item.toJSON();
                    itemJSON.index = index;
                    var itemListTemplate = this.template(itemJSON);
                    listViewEl.append(itemListTemplate);
                }, this);
            } else {
                listViewEl.empty();
                var msgRow = "<tr><br/><br/><td colspan='6'><span class='msg'>No items in the list</span></td></tr>";
                listViewEl.append(msgRow);
                $("#wishlist-items tr").addClass("center");
                $("#wishlist-items td").css('paddingTop', '50px');
            }

            return this;
        }
    });
});