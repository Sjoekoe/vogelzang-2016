<template>
    <section class="panel">
        <header class="panel-heading">
            {{ total }} nieuws items.
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#createMessage">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Gemaakt door</th>
                    <th>Gepubliceerd op</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="article in articles">
                    <td>{{ article.title }}</td>
                    <td>{{ article.userRelation.data.username }}</td>
                    <td>{{ article.created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#showMessage" @click="fillModalData(article)">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeArticle" @click="setArticleToRemove(article)">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="modal fade" id="showMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ articleToShow.title }}</h4>
                </div>
                <div class="modal-body" v-html="articleToShow.message">
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Nieuw nieuwsbericht</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" name="title" id="title" v-model="title" class="form-control" placeholder="Onderwerp">
                        <p class="text-danger" v-if="errors.title">{{ errors.title[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="message">Bericht</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" v-model="message" placeholder="Bericht..."></textarea>
                        <p class="text-danger" v-if="errors.message">{{ errors.message[0] }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button class="btn btn-success" disabled v-if="creating">Opslaan... <i class="fa fa-spin fa-spinner"></i></button>
                    <button class="btn btn-success" @click="createMessage()" v-else>Opslaan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="removeArticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ben je zeker dat je dit bericht wilt verwijderen?</h4>
                </div>
                <div class="modal-body">
                    {{ articleToRemove.title }}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button class="btn btn-danger" type="button" @click="removeArticle(articleToRemove)">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                articles: [],
                total: 0,
                articleToRemove: '',
                articleToShow: '',
                title: '',
                message: '',
                creating: false,
                success: false,
                token: window.vogelzang.auth.jwt,
                errors: [],
            }
        },

        ready: function() {
            this.fetchAllRecords();
        },

        methods: {
            removeArticle: function(article) {
                this.messages.$remove(article);

                $("#removeArticle").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: 'api/articles/' + article.id + '?token=' + this.token,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },

            fillModalData: function(article) {
                this.articleToShow = article;
            },

            setArticleToRemove: function(article) {
                this.articleToRemove = article;
            },

            createMessage: function() {
                this.creating = true;

                var data = {
                    'title': this.title,
                    'message': this.message,
                }

                var vm = this;

                $.ajax({
                    url: '/api/articles?token=' + vm.token,
                    method: 'POST',
                    data: data,
                    success: function () {
                        vm.success = true;

                        vm.name = '';
                        vm.email = '';
                        vm.creating = false;

                        vm.fetchAllRecords();

                        $("#createMessage").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                    }.bind(vm),
                    error: function (errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.creating = false;
                    }.bind(vm)
                })
            },

            fetchAllRecords: function() {
                $.getJSON('/api/articles?token=' + this.token, function(articles) {
                    this.total = articles.meta.pagination.total;
                    this.articles = articles.data;
                    this.messages = articles.data;
                }.bind(this));
            }
        },
    }
</script>
