App = Ember.Application.create();

App.Router.map(function() {
  this.resource('aboutme');
  this.resource('cases', function() {
    this.resource('case', { path: ':case_id' });
  });
});

App.IndexRoute = Ember.Route.extend({
  redirect: function () {
    this.transitionTo('cases');
  }
});

App.CasesIndexRoute = Ember.Route.extend({
    model: function() {
        return App.Case.find();
    }
});

App.CasesRoute = Ember.Route.extend({
    model: function() {
      return App.Case.find();
    }
});

App.Case = DS.Model.extend({
    app_uid: DS.attr('string'),
    app_status: DS.attr('string'),
    app_title: DS.attr('string'),
    app_pro_title: DS.attr('string'),
    app_tas_title: DS.attr('string'),
    app_current_user: DS.attr('string'),
    del_priority: DS.attr('string')

});

App.Store = DS.Store.extend({
      revision: 12
});

DS.RESTAdapter.reopen({
  url: 'data'
});
