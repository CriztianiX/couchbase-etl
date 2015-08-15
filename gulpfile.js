var gulp = require('gulp');
var xmlpoke = require('xmlpoke');
var args = require('yargs').argv;
var config = require('./config.json');

gulp.task('default', [], function() {
  console.log(" Use: gulp [configuration | build]");
});

gulp.task('configuration', [], function(cb) {
    var cfg = config[ process.env.ENV || 'development' ];

    xmlpoke('./App.config', function(xml) {
        xml.withBasePath('configuration')
          .set('workers', cfg["num_workers"])
          .set('implementation', cfg["implementation"])
          .set('connectionStrings/rds/driver', cfg["rds"]["driver"])
          .set('connectionStrings/rds/connectionString', cfg["rds"]["connectionString"])
          .set('connectionStrings/couchbase/bucket', cfg["couchbase"]["bucket"])
          .set('connectionStrings/couchbase/connectionString', cfg["couchbase"]["connectionString"]);
    });
    cb();
});

gulp.task('build', ['configuration'], function() {
  console.log("Done!");
});
