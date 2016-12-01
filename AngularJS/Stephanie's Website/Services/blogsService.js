/**
 * @ngInject
 */
module.exports = function($http, BASE_URI, $q){
  'use strict';

  return {
    Get: function() {
      var q = $q.defer();
      $http.get( BASE_URI + 'blogs.php')
        .success(function(data) {
           q.resolve(data);
        });
      return q.promise;
      }, 
      GetBlog: function(Num) {
      var q = $q.defer();
      $http.get( BASE_URI + 'blog.php?id='+ Num)
        .success(function(data) {
           q.resolve(data);
        });
      return q.promise;
      }, 
  };
};