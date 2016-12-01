/**
 * @ngInject
 */
module.exports = function($http, BASE_URI, $q){
  'use strict';

  return {
    Get: function(Id) {
      var q = $q.defer();
      $http.get( BASE_URI + 'comments.php?blog_id='+ Id)
        .success(function(data) {
           q.resolve(data);
        });
      return q.promise;
      }
  };
};