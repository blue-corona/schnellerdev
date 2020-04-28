jQuery( document ).ready(function($) {
	"use strict";
	// This app is for theme customizer social media urls 
	var app = angular.module("customizerSocialMediaUrls", [])
	app.controller("SocialMediaCtrl", function($scope) {
		wp.customize('bc_theme_social_media[bc_social_media]', function (setting) {
			var socialMediaUrls = setting._value;
			if(socialMediaUrls == "" || !socialMediaUrls){
			    $scope.fields = [
			    {name:"Facebook",url:"",icon:"fab fa-facebook-f",order:""},
			    {name:"LinkedIn",url:"",icon:"fab fa-linkedin",order:""},
			    {name:"Twitter",url:"",icon:"fab fa-twitter",order:""},
			    {name:"Instagram",url:"",icon:"fab fa-instagram",order:""},
			    {name:"Youtube",url:"",icon:"fab fa-youtube",order:""},
			    {name:"Pinterest",url:"",icon:"fab fa-pinterest-p",order:""},
			    ]; 
		        return;
		    }
		    $scope.fields = JSON.parse(socialMediaUrls);
 		});

	    $scope.$watch(function(){
	        return $scope.fields;
	    }, function(newValue, oldValue) {
	        if(newValue == oldValue){
	            return;
	        }
	        wp.customize('bc_theme_social_media[bc_social_media]', function (setting) {
	        	setting.set(JSON.stringify(newValue));
	        });
	    }, true);
	    $scope.addField = function () {
	        $scope.fields.push({name:"Other",url:"",icon:"",order:""});
	    }
	    $scope.removeField = function (index) {
	      if($scope.fields.length>1){
	        $scope.fields.splice(index, 1);
	      }
	    }
	    $scope.fetchLogo = function (index){
	    	return $scope.fields[index].icon;
	    }
	    $scope.string = function () {
	      return JSON.stringify($scope.fields);
	    }
	});
	// This app is for theme customizer tracking code
	var app2 = angular.module('trackingPerPage',[]);
	app2.controller("TrackingCtrl", function($scope){
		wp.customize('bc_site_perpage_scheme[per_page_code]', function (setting) {
			var perPageCode = setting._value;
			if(perPageCode == "" || !perPageCode){
			    $scope.fields = [{pageId:"",trackingCode:"",location:""}]; 
		        return;
		    }
		    $scope.fields = JSON.parse(perPageCode);
 		});

		$scope.$watch(function(){
	        return $scope.fields;
	    }, function(newValue, oldValue) {
	        if(newValue == oldValue){
	            return;
	        }

	        wp.customize('bc_site_perpage_scheme[per_page_code]', function (setting) {
	        			setting.set(JSON.stringify(newValue));
	        		}
	        );
	    }, true);

 		$scope.addField = function () {
	        $scope.fields.push({pageId:"",trackingCode:"",location:""});
	    }
	    $scope.removeField = function (index) {
	      if($scope.fields.length>1){
	        $scope.fields.splice(index, 1);
	      }
	    }
	    $scope.string = function () {
	      return JSON.stringify($scope.fields);
	    }

	});
	angular.bootstrap(document, ['customizerSocialMediaUrls', 'trackingPerPage']);
});
