var angular = require('angular');

var services = angular.module('IEEEWebsite.Services', []);
module.exports = services;

services.service('BlogsService',	require('./BlogsService'));
services.service('CommentsService',	require('./CommentsService'));
services.service('VideosService',	require('./VideosService'));
services.service('PicturesService',	require('./PicturesService'));
services.service('SidePanService',	require('./SidePanService'));