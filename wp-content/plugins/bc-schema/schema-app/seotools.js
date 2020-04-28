// App
$ = jQuery;
var schema_type_var = "";
$(document).ready(function(){
    schema_type_var = $("#schema_type").val();
});
jQuery(document).ready(function ($) {
    $("#contextual-help-link").click(function () {
        $("#contextual-help-wrap").css("cssText", "display: block !important;");
    });
    $("#show-settings-link").click(function () {
        $("#screen-options-wrap").css("cssText", "display: block !important;");
    });
});

(function () {'use strict'; angular.module('app', [
    'ngAria'
    ,'ngAnimate'
    ,'ngMaterial'
    ,'app.layout'
    ,'angular-clipboard'
    ,'ngMessages'
    ]);
    

}
)();

//Search boxes

angular.module('app').controller('select-searchbox', function($scope) { 
    $scope.search_term; $scope.clear_search_term = function() {$scope.search_term = '';};

$('.select-search-searchbox').on('keydown', function(ev) {ev.stopPropagation();});
});

//Code Prettify
angular.module('app').controller('prettyPrint', function($scope) {
    setTimeout(function(){prettyPrint();}); 
});

//Schema Markup Generator
angular.module('app').controller('schema-markup-generator', function($rootScope,$scope,$http,$timeout,$mdToast,$mdDialog, $window) { 

    $scope.$watch(function(){
        return window.schema_type_var;
    }, function(newValue, oldValue) {

        
        if(newValue == "" || !newValue || typeof newValue == "undefined"){
            return;
        }

        $scope.localbusiness = JSON.parse(newValue);
        if(typeof $scope.localbusiness.location != "undefined"){
            if(typeof $scope.localbusiness.location.country != "undefined" &&  $scope.localbusiness.location.country != ""){
                $scope.loadStates($scope.localbusiness.location.country);
            }
        }

    });

    $scope.$watch(function(){
        return $scope.localbusiness;
    }, function(newValue, oldValue) {
        if(newValue == oldValue){
            return;
        }
        $("#schema_type").val(JSON.stringify(newValue));
    }, true);

    var mediaUploader;
    
    $('.btn-upload').on('click',function(e) {

        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Select a Picture',
            button: {
                text: 'Select Picture'
            },
            multiple: false
        });
        
        var buttonId = this.id;

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            if(buttonId=='image-btn'){
                $scope.localbusiness.img = attachment.url;
            }else{
                $scope.localbusiness.logo = attachment.url;
            }
            $scope.$apply();
            mediaUploader = null;
        });
        
        mediaUploader.open();
        
    });

    $rootScope.url_pattern = '^https?:\\/\\/\\w+[\\w-\\.]*?\\w+\\.\\w{2,}(\\/.*)?';
    $scope.schema_markup = {name:"Local Business",slug:"localbusiness",icon:"store",text:""};
    // $scope.logSchema = function() {
    //     //console.log($scope.schema_markup);
    //     ga('send', 'pageview', {
    //         'page': '/tools/schema-markup-generator/#' + $scope.schema_markup.slug,
    //         'title': 'Schema Markup Generator: ' + $scope.schema_markup.name + ' | TechnicalSEO.com'
    //     }); 
    // }           
    
    $scope.schema_markups = [
        {name:"Article",slug:"article",icon:"newspaper",text:"- NewsArticle, BlogPosting"},
        {name:"Breadcrumb",slug:"breadcrumb",icon:"chevron-double-right",text:""},
        {name:"Event",slug:"event",icon:"calendar",text:""},
        {name:"FAQ Page",slug:"faq",icon:"help-circle-outline",text:""},
        {name:"How-to",slug:"howto",icon:"format-list-numbered",text:""},
        {name:"Job Posting",slug:"jobposting",icon:"briefcase",text:""},
        {name:"Local Business",slug:"localbusiness",icon:"store",text:""},
        {name:"Organization",slug:"organization",icon:"domain",text:"- Logo, Contacts, Social Profile"},
        {name:"Person",slug:"person",icon:"account",text:"- Social Profile, Job Information"},
        {name:"Product",slug:"product",icon:"tag-outline",text:"- Offer, AggregateRating, Reviews"},
        {name:"Recipe",slug:"recipe",icon:"chef-hat",text:""},
        {name:"Video",slug:"video",icon:"video",text:""},
        {name:"Website",slug:"website",icon:"web",text:"- Sitelinks Searchbox"}
    ];  
    
    $scope.article = {images:[{}]};
    $scope.breadcrumbs = [{},{}];
    $scope.event = {offers:[]}; 
    $scope.faq = [{}];
    $scope.howto = {supplies:[],tools:[],steps:[{}]};
    $scope.jobposting = {};
    $scope.localbusiness = {
                                geo:{latitude:"",longitude:""},
                                hoursspecs:[],
                                social_profiles:[]
                                
                            };
    $scope.organization = {contacts:[]};
    $scope.person = {};
    $scope.product = {reviews:[]};
    $scope.recipe = {images:[{}],ingredients:[],instructions:[],reviews:[]}; 
    $scope.video = {images:[{}]};
    $scope.website = {};
    
    $scope.social_platforms = [
        {name:"Facebook",icon:"facebook"},
        {name:"Twitter",icon:"twitter"},
        {name:"Instagram",icon:"instagram"},
        {name:"YouTube", icon:"youtube"},
        {name:"LinkedIn", icon:"linkedin"},
        {name:"Pinterest", icon:"pinterest"},
        {name:"SoundCloud", icon:"soundcloud"},
        {name:"Tumblr", icon:"tumblr"},
        {name:"Wikipedia", icon:"wikipedia"},
        {name:"Github", icon:"github-circle"},
        {name:"Website", icon:"web"},
        {name:"Other", icon:"web"}
    ];
    $scope.corporate_contacts = [
        {type:"Customer service", icon:"face-agent"},
        {type:"Technical support", icon:"settings"},
        {type:"Billing support", icon:"receipt"},
        {type:"Bill payment", icon:"cash"},
        {type:"Sales", icon:"currency-usd"},
        {type:"Reservations", icon:"calendar-check"},
        {type:"Credit card support", icon:"credit-card"},
        {type:"Emergency", icon:"alarm-light"},
        {type:"Baggage tracking", icon:"bag-personal"},
        {type:"Roadside assistance", icon:"car"},
        {type:"Package tracking", icon:"package-variant"}
    ];  
    $scope.id_properties = [
        {name:"sku"},
        {name:"gtin8"},
        {name:"gtin13"},
        {name:"gtin14"},
        {name:"mpn"}
    ];      
    $scope.organizations = [];
    $scope.organizations.unshift({"name":"Organization","description":"An organization such as a school, NGO, corporation, club, etc."});
    // //Organizations List
    // $http({method:'GET', url:'./assets/data/schemas.php?type=Organization',cache:true}).then(function successCallback(response) {
    //     $scope.organizations = response.data;
    //     $scope.organizations.unshift({"name":"Organization","description":"An organization such as a school, NGO, corporation, club, etc."});
    // }); 

    //Local Businesses List
    $scope.local_businesses = [];
    $scope.local_businesses.unshift({"name":"LocalBusiness","description":"A particular physical business or branch of an organization."});
    // $http({method:'GET', url:'./assets/data/schemas.php?type=LocalBusiness',cache:true}).then(function successCallback(response) {
    //     $scope.local_businesses = response.data;
    //     $scope.local_businesses.unshift({"name":"LocalBusiness","description":"A particular physical business or branch of an organization."});
    // });     
    //Region List
    $http({method:'GET', url:window.angular_app_url+'/regions.json',cache:true}).then(function successCallback(response) {
        $scope.regionsList = response.data;
    }); 
    $scope.regions = null; 
    $scope.loadRegions = function() {
        if ($scope.regions == null) {  
            return $timeout(function() {
                $scope.regions = $scope.regionsList;
            }, 500);
        }
    };
     
    $scope.regions_ot = [{"code":"US", "name":"United States"},{"code":"GB", "name":"United Kingdom"},{"code":"CA", "name":"Canada"}];  
    
    $scope.checkRegion = function(regioncode) {if ($scope.regions_ot.find(o=>o.code===regioncode)) {return false;} else {return true;}}
        
    //State/Province/Region List

    function getAmericanStates(){
        $http({method:'GET', url:window.angular_app_url+'/united-states.json',cache:true}).then(function successCallback(response) {
            $scope.states = response.data;
        });
    }

    $scope.states = null; 
    $scope.loadStates = function(country) {
        if (country == 'US') {  
            getAmericanStates();
        } else if (country=='CA') {
            $scope.states = [
                {"code":"AB", "name":"Alberta"},
                {"code":"BC", "name":"British Columbia"},
                {"code":"MB", "name":"Manitoba"},
                {"code":"NB", "name":"New Brunswick"},
                {"code":"NL", "name":"Newfoundland and Labrador"},
                {"code":"NS", "name":"Nova Scotia"},
                {"code":"ON", "name":"Ontario"},
                {"code":"PE", "name":"Prince Edward Island"},
                {"code":"QC", "name":"Quebec"},
                {"code":"SK", "name":"Saskatchewan"},
                {"code":"NT", "name":"Northwest Territories"},
                {"code":"NU", "name":"Nunavut"},
                {"code":"YT", "name":"Yukon"}
            ]
        } else if (country=='AU') {
            $scope.states = [
                {"code":"ACT", "name":"Australian Capital Territory"},
                {"code":"NSW", "name":"New South Wales"},
                {"code":"NT",  "name":"Northern Territory"},
                {"code":"QLD", "name":"Queensland"},
                {"code":"SA",  "name":"South Australia"},
                {"code":"TAS", "name":"Tasmania"},
                {"code":"VIC", "name":"Victoria"},
                {"code":"WA",  "name":"Western Australia"}
            ]           
        } else {$scope.states = null;}
    };      
   
    //Get coordinates
    $scope.geocodeIcon = "crosshairs-gps";
    $scope.getCoordinates = function() {
        $scope.geocodeIcon = "loading mdi-spin";
        var address = $scope.localbusiness.location.street + ', ' + $scope.localbusiness.location.city + ' ' + $scope.localbusiness.location.state + ' ' + $scope.localbusiness.location.zip + ', ' + $scope.localbusiness.location.country;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( {'address': address}, function(results, status) {
            if (status == 'OK') {
                var geocoordinates = results[0].geometry.location+" ";
                geocoordinates = geocoordinates.replace('(', '').replace(') ', '').split(", ");
                var lat = geocoordinates[0], lng = geocoordinates[1];
                $scope.localbusiness.geo.latitude = lat;
                $scope.localbusiness.geo.longitude = lng;
                var toast = $mdToast.simple().position('bottom right').hideDelay(3000).toastClass('success-toast').textContent('Geo coordinates successfully fetched');
            } else {
                $scope.localbusiness.geo.latitude = "0";
                $scope.localbusiness.geo.longitude = "0";
                var toast = $mdToast.simple().position('bottom right').hideDelay(3000).toastClass('danger-toast').textContent('Geocoding was not successful');
            }
            $scope.geocodeIcon = "crosshairs-gps";
            $mdToast.show(toast);
        });
    };
    
    //Copy to clipboard 
    $scope.copy_schema = function () {$scope.textToCopy = $("pre.prettyprint").text();};    
    $scope.copy_success = function () {
        var toast = $mdToast.simple().position('bottom right').hideDelay(3000).toastClass('default-toast').textContent('JSON-LD copied to clipboard');
        $mdToast.show(toast);
    };
    $scope.copy_fail = function (err) {
        var toast = $mdToast.simple().position('bottom right').hideDelay(3000).toastClass('danger-toast').textContent('Failed to copy ' + err);
        $mdToast.show(toast);
    };
    // Validate
    $("#validate_schema").click(function($scope){
        $("textarea[name='code']").val($("pre.prettyprint").text());
        $("textarea[name='code']").parent('form').submit();
    });
    $("#validate_schema2").click(function($scope){
        $("textarea[name='code_snippet']").val($("pre.prettyprint").text());
        $("textarea[name='code_snippet']").parent('form').submit();
    });
    
    //Reset form
    $("#reset_schema").click(function($scope){
        $("#reset_schema_btn").click();
    }); 
    // $("#reset_schema_btn").click(function(e){
    //     e.preventDefault();
    // });
    // $scope.reset_schema = function(ev) {};
    $scope.reset_schema = function(ev) {

        $scope.article = {};
        $scope.breadcrumbs = [{},{}];
        $scope.event = {offers:[]}; 
        $scope.faq = [{}];
        $scope.howto = {supplies:[],tools:[],steps:[{}]};
        $scope.jobposting = {};
        $scope.localbusiness = {
                                    geo:{latitude:"",longitude:""},
                                    hoursspecs:[],
                                    social_profiles:[]
                                
                                };
        $scope.organization = {contacts:[]};
        $scope.person = {};
        $scope.product = {reviews:[]};
        $scope.recipe = {images:[{}],ingredients:[],instructions:[],reviews:[]}; 
        $scope.video = {images:[{}]};
        $scope.website = {};
    };

    $scope.addSocialProfile = function () {
        $scope.localbusiness.social_profiles.push({name:"Other", icon:"web"});
    };  
    $scope.delSocialProfile = function (index){
        $scope.localbusiness.social_profiles.splice(index, 1); 
    }  
    
});


/* app/layout/layout.module.js */
(function () {'use strict'; angular.module('app.layout', []);})(); 

/* app/layout/layout.directive.js */
(function () {
    'use strict';

    angular.module('app.layout')
        .directive('uiPreloader', ['$rootScope', uiPreloader])
        .directive('toggleNavCollapsedMin', ['$rootScope', toggleNavCollapsedMin])
        .directive('collapseNav', collapseNav)
        .directive('highlightActive', highlightActive)
        .directive('toggleOffCanvas', toggleOffCanvas)
        .directive('slimScroll', slimScroll);

    function uiPreloader($rootScope) {
        return {
            restrict: 'A',
            template:'<span class="bar"></span>',
            link: function(scope, el, attrs) {        
                el.addClass('preloaderbar hide');
                scope.$on('$routeChangeStart', function(event) {
                    el.removeClass('hide').addClass('active');
                });
                scope.$on('$routeChangeSuccess', function(event, toState, toParams, fromState) {
                    event.targetScope.$watch('$viewContentLoaded', function(){
                        el.addClass('hide').removeClass('active');
                    })
                });

                scope.$on('preloader:active', function(event) {
                    el.removeClass('hide').addClass('active');
                });
                scope.$on('preloader:hide', function(event) {
                    el.addClass('hide').removeClass('active');
                });                
            }
        };        
    }

    // switch for mini style NAV, realted to 'collapseNav' directive
    function toggleNavCollapsedMin($rootScope) {
        var directive = {
            restrict: 'A',
            link: link
        };

        return directive;

        function link(scope, ele, attrs) {
            var app;

            app = $('#app');

            ele.on('click', function(e) {
                if (app.hasClass('nav-collapsed-min')) {
                    app.removeClass('nav-collapsed-min');
                } else {
                    app.addClass('nav-collapsed-min');
                    $rootScope.$broadcast('nav:reset');
                }
                return e.preventDefault();
            });            
        }
    }

    // for accordion/collapse style NAV
    function collapseNav() {
        var directive = {
            restrict: 'A',
            link: link
        };

        return directive;

        function link(scope, ele, attrs) {
            var $a, $aRest, $app, $lists, $listsRest, $nav, $window, Timer, prevWidth, slideTime, updateClass;

            slideTime = 250;

            $window = $(window);

            $lists = ele.find('ul').parent('li');

            $lists.append('<i class="fa fa-angle-down icon-has-ul-h"></i>');

            $a = $lists.children('a');
            $a.append('<i class="fa fa-angle-down icon-has-ul"></i>');

            $listsRest = ele.children('li').not($lists);

            $aRest = $listsRest.children('a');

            $app = $('#app');

            $nav = $('#nav-container');

            $a.on('click', function(event) {
                var $parent, $this;
                if ($app.hasClass('nav-collapsed-min') || ($nav.hasClass('nav-horizontal') && $window.width() >= 768)) {
                    return false;
                }
                $this = $(this);
                $parent = $this.parent('li');
                $lists.not($parent).removeClass('open').find('ul').slideUp(slideTime);
                $parent.toggleClass('open').find('ul').stop().slideToggle(slideTime);
                event.preventDefault();
            });

            $aRest.on('click', function(event) {
                $lists.removeClass('open').find('ul').slideUp(slideTime);
            });

            scope.$on('nav:reset', function(event) {
                $lists.removeClass('open').find('ul').slideUp(slideTime);
            });

            Timer = void 0;

            prevWidth = $window.width();

            updateClass = function() {
                var currentWidth;
                currentWidth = $window.width();
                if (currentWidth < 768) {
                    $app.removeClass('nav-collapsed-min');
                }
                if (prevWidth < 768 && currentWidth >= 768 && $nav.hasClass('nav-horizontal')) {
                    $lists.removeClass('open').find('ul').slideUp(slideTime);
                }
                prevWidth = currentWidth;
            };

            $window.resize(function() {
                var t;
                clearTimeout(t);
                t = setTimeout(updateClass, 300);
            });
          
        }
    }

    // Add 'active' class to li based on url, muli-level supported, jquery free
    function highlightActive() {
        var directive = {
            restrict: 'A',
            controller: [ '$scope', '$element', '$attrs', '$location', highlightActiveCtrl]
        };

        return directive;

        function highlightActiveCtrl($scope, $element, $attrs, $location) {
            var highlightActive, links, path;

            links = $element.find('a');

            path = function() {
                return $location.path();
            };

            highlightActive = function(links, path) {
                path = '.' + path;
                return angular.forEach(links, function(link) {
                    var $li, $link, href, $lili;
                    $link = angular.element(link);
                    $li = $link.parent('li');
                    $lili = $li.parent('ul').parent('li');
                    href = $link.attr('href');
                    if ($li.hasClass('active')) {
                        $li.removeClass('active');
                    }
                    if (path.indexOf(href) === 0) {
                        return $li.addClass('active'),$lili.addClass('active');
                    }
                });
            };

            highlightActive(links, $location.path());

            $scope.$watch(path, function(newVal, oldVal) {
                if (newVal === oldVal) {
                    return;
                }
                return highlightActive(links, $location.path());
            });

        }

    }

    // toggle on-canvas for small screen, with CSS
    function toggleOffCanvas() {
        var directive = {
            restrict: 'A',
            link: link
        };

        return directive;

        function link(scope, ele, attrs) {
            ele.on('click', function() {
                return $('#app').toggleClass('on-canvas');
            });         
        }
    }

    function slimScroll() {
        return {
            restrict: 'A',
            link: function(scope, ele, attrs) {
            return ele.slimScroll({
                height: attrs.scrollHeight || '100%'
            });
            }
        };
    }    
})(); 