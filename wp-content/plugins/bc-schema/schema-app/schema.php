<!-- CSS Dependencies -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.19/angular-material.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.7.95/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">

<link rel="stylesheet" href="<?php echo BCPLUGINURL;?>/bc-schema-master/schema-app/main-unmin.css">
<link rel="preconnect" href="https://c.disquscdn.com" crossorigin>
<!-- JS Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-animate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-aria.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-messages.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.5/angular-material.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-clipboard/1.6.2/angular-clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>

<script src="<?php echo BCPLUGINURL;?>/bc-schema-master/schema-app/seotools.js"></script>

<div ng-app="app">
	<div class="row animate-fade-up">
		<div class="page" ng-controller="schema-markup-generator">
			<div class="panel panel-default" ng-if="schema_markup">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6">
							<h4><i class="mdi mdi-{{schema_markup.icon}} mdi-mr"></i><b>{{schema_markup.name}}</b> <small>{{schema_markup.text}}</small></h4>
						</div>
						<div class="col-xs-6 text-right">
							<md-button aria-label="Copy" class="md-fab md-mini md-primary btn-copy" clipboard ng-click="copy_schema()" text="textToCopy" on-copied="copy_success()" on-error="copy_fail(err)" title="Copy">
								<i class="fa fa-clone"></i>
							</md-button>
							<md-menu md-position-mode="target-right target">
								<md-button class="md-fab md-mini btn-copy" ng-click="$mdMenu.open()">
									<md-tooltip md-direction="top">Test</md-tooltip><i class="fa fa-google"></i>
								</md-button>
								<md-menu-content>
										<md-menu-item>
												<md-button type="submit" id="validate_schema2">
													<i class="mdi mdi-star-outline mdi-mr"></i>Rich Results Test
												</md-button>
										</md-menu-item>
										<md-menu-item>
												<md-button type="submit" id="validate_schema">
													<i class="mdi mdi-code-braces mdi-mr"></i>Structured Data Testing Tool
												</md-button>
										</md-menu-item>
								</md-menu-content>
							</md-menu>
							<md-button id="reset_schema" class="md-fab md-mini bg-danger">
								<md-tooltip md-direction="top">Reset</md-tooltip><i class="mdi mdi-delete-outline"></i>
							</md-button>
						</div>
					</div>
					<hr>
					<div class="row animate-fade-up" ng-controller="schema-markup-generator">
						<div class="col-sm-7" ng-form="localbusiness_form">
							<div class="row">
								<div class="col-sm-6">
									<md-input-container>
										<label>More specific @type</label>
										<input type="text" ng-model="localbusiness.type2.name" autocomplete="off">
									</md-input-container>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-5">
									<md-input-container>
										<input type="text" ng-model="localbusiness.location.street" placeholder="Street">
									</md-input-container>
								</div>
								<div class="col-sm-4 col-xs-7">
									<md-input-container>
										<input type="text" ng-model="localbusiness.location.city" placeholder="City">
									</md-input-container>
								</div>
								<div class="col-sm-3 col-xs-5">
									<md-input-container>
										<input type="text" ng-model="localbusiness.location.zip" placeholder="Zip code" autocomplete="off">
									</md-input-container>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<md-input-container>
										<label>Country</label>
										<md-select ng-model="localbusiness.location.country" ng-change="localbusiness.location.state='';loadStates(localbusiness.location.country)" md-container-class="select-search" ng-controller="select-searchbox" md-on-open="loadRegions()" md-on-close="clear_search_term()">
											<md-select-header class="select-search-header">
												<input ng-model="search_term" type="search" placeholder="Search a country..." class="select-search-searchbox md-text">
											</md-select-header>
											<md-option ng-repeat="country in regions_ot | filter:search_term" ng-value='country.code'><i class="flag-icon flag-icon-{{country.code | lowercase}} mdi-mr"></i>{{country.name}}<small>{{country.code}}</small></md-option>
											<md-divider></md-divider>
											<md-option ng-repeat="country in regions | filter:search_term" ng-value='country.code' ng-if="checkRegion(country.code)"><i class="flag-icon flag-icon-{{country.code | lowercase}} mdi-mr"></i>{{country.name}}<small>{{country.code}}</small></md-option>
										</md-select>
										<div class="md-errors-spacer"></div>
									</md-input-container>
								</div>
								<div class="col-sm-6">
									<md-input-container>
										<label>State/Province/Region</label>
										<md-select ng-model="localbusiness.location.state" md-container-class="select-search" ng-controller="select-searchbox" md-on-close="clear_search_term()" ng-disabled="(localbusiness.location.country=='US' || localbusiness.location.country=='CA' || localbusiness.location.country=='AU') ? false : true">
											<md-select-header class="select-search-header">
												<input ng-model="search_term" type="search" placeholder="Search..." class="select-search-searchbox md-text">
											</md-select-header>
											<md-option ng-repeat="state in states | filter:search_term" ng-value='state.code'>{{state.name}}<small>{{state.code}}</small>
											</md-option>
										</md-select>
										<div class="md-errors-spacer"></div>
									</md-input-container>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<md-input-container>
									<input type="number" step="0.01" ng-model="localbusiness.rating_value" name="ratingValue" placeholder="Rating Value (average star)" autocomplete="off">
									</md-input-container>
								</div>
								<div class="col-sm-6">
									<md-input-container>
									<input type="number" step="1" ng-model="localbusiness.review_count" name="reviewCount" placeholder="Review Count" autocomplete="off">
									</md-input-container>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-9">
									<md-input-container>
										<input type="url" id="logo-url" ng-model="localbusiness.logo" name="logo" ng-pattern="url_pattern" ng-model-options="{allowInvalid:true}" placeholder="Logo" autocomplete="off">
										<div ng-messages="localbusiness_form.logo.$error" role="alert">
											<div ng-message="pattern">Invalid URL</div>
										</div>
									</md-input-container>
								</div>
								<div class="col-sm-3">
									<md-input-container>
										<md-button class="md-raised md-primary btn-white btn-submit btn-block btn-upload" id="logo-btn" ><i class="mdi mdi-upload mdi-mr"></i>Upload</md-button>
									</md-input-container>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<md-input-container>
										<input type="text" ng-model="localbusiness.name" placeholder="Name">
									</md-input-container>
								</div>
								<div class="col-sm-6">
									<md-input-container>
										<input type="url" ng-model="localbusiness.url" name="url" ng-pattern="url_pattern" ng-model-options="{allowInvalid:true}" placeholder="URL" autocomplete="off">
										<div ng-messages="localbusiness_form.url.$error" role="alert">
											<div ng-message="pattern">Invalid URL</div>
										</div>
									</md-input-container>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-9">
									<md-input-container>
										<input type="url" class="upload-img" ng-model="localbusiness.img" name="img" ng-pattern="url_pattern" ng-model-options="{allowInvalid:true}" placeholder="Image URL" autocomplete="off" id="image-url">
										<div ng-messages="localbusiness_form.img.$error" role="alert">
											<div ng-message="pattern">Invalid URL</div>
										</div>
									</md-input-container>
								</div>
								<div class="col-sm-3">
									<md-input-container>
										<md-button class="md-raised md-primary btn-white btn-submit btn-block btn-upload" id="image-btn" ><i class="mdi mdi-upload mdi-mr"></i>Upload</md-button>
									</md-input-container>
								</div>
							</div>
							<div class="row">

								<div class="col-sm-4 col-xs-7">
									<md-input-container>
										<input type="tel" ng-model="localbusiness.phone" placeholder="Phone" ng-model-options="{allowInvalid:true}">
									</md-input-container>
								</div>
								<div class="col-sm-4 col-xs-6">
									<md-input-container>
										<input type="text" ng-model="localbusiness.geo.latitude" placeholder="Latitude">
									</md-input-container>
								</div>
								<div class="col-sm-4 col-xs-6">
									<md-input-container>
										<input type="text" ng-model="localbusiness.geo.longitude" placeholder="Longitude">
									</md-input-container>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-sm-4">
									<md-input-container>
										<md-button class="md-raised md-accent btn-white btn-submit btn-block" ng-click="getCoordinates()" ng-disabled="(localbusiness.location.street && localbusiness.location.city && localbusiness.location.zip && localbusiness.location.country) ? false : true"><i class="mdi mdi-{{geocodeIcon}} mdi-mr"></i>Geo Coordinates</md-button>
									</md-input-container>
								</div>
							</div> -->
							<div class="row">
								<div class="col-sm-5">
									<md-input-container>
										<md-button class="md-raised md-primary btn-white btn-submit btn-block" ng-click="localbusiness.hoursspecs.push({})" ng-disabled="localbusiness.open247"><i class="mdi mdi-plus mdi-mr"></i>Add opening hours</md-button>
									</md-input-container>
								</div>
								<div class="col-sm-2 text-center" style="padding-right: 0px;padding-left: 0px;">
									<md-input-container>
										<md-checkbox aria-label="open 24/7" ng-model="localbusiness.open247" class="md-primary">Open 24/7</md-checkbox>
									</md-input-container>
								</div>
								<div class="col-sm-5">
									<md-input-container>
										<md-button ng-click="addSocialProfile()" class="md-raised md-primary btn-white btn-submit btn-block" ><i class="mdi mdi-plus mdi-mr"></i>Add Social Profiles</md-button>
									</md-input-container>
								</div>
							</div>
							<div class="row" ng-repeat="hoursspec in localbusiness.hoursspecs" ng-hide="localbusiness.open247">
								<div class="col-sm-4">
									<md-input-container>
										<label>Day(s) of the week</label>
										<md-select ng-model="hoursspec.days" multiple>
											<md-option value='Monday'>Monday</md-option>
											<md-option value='Tuesday'>Tuesday</md-option>
											<md-option value='Wednesday'>Wednesday</md-option>
											<md-option value='Thursday'>Thursday</md-option>
											<md-option value='Friday'>Friday</md-option>
											<md-option value='Saturday'>Saturday</md-option>
											<md-option value='Sunday'>Sunday</md-option>
										</md-select>
										<div class="md-errors-spacer"></div>
									</md-input-container>
								</div>
								<div class="col-sm-3">
									<md-input-container>
										<input type="text" ng-model="hoursspec.opens" name="opens" pattern="[0-9]{2}:[0-9]{2}" placeholder="Opens at (e.g. 08:00)" autocomplete="off">
										<div ng-messages="localbusiness_form.opens.$error" role="alert">
											<div ng-message="pattern">Invalid time</div>
										</div>
									</md-input-container>
								</div>
								<div class="col-sm-3 col-xs-9">
									<md-input-container>
										<input type="text" ng-model="hoursspec.closes" name="closes" pattern="[0-9]{2}:[0-9]{2}" placeholder="Closes at (e.g. 21:00)" autocomplete="off">
										<div ng-messages="localbusiness_form.closes.$error" role="alert">
											<div ng-message="pattern">Invalid time</div>
										</div>
									</md-input-container>
								</div>
								<div class="col-sm-2 col-xs-3 text-center">
									<md-input-container>
										<md-button class="md-raised md-warn btn-white btn-submit btn-remove" ng-click="localbusiness.hoursspecs.splice($index, 1)"><i class="mdi mdi-close"></i></md-button>
									</md-input-container>
								</div>
							</div>

							<div class="row" ng-repeat="profile in localbusiness.social_profiles track by $index">
								
								<md-input-container class="md-icon-float md-block" md-no-float >
									<div class="row" ng-if="profile.name != 'Other'" >
										<div class="col-sm-1"><i class="mdi mdi-{{profile.icon}}"></i></div>
										<div class="col-sm-10"><input type="url" ng-model="profile.url" placeholder="URL" ng-model-options="{allowInvalid:true}"></div>
									</div>
									<div class="row" ng-if="profile.name == 'Other'" >
										<div class="col-sm-1">
											<i class="mdi mdi-{{profile.icon}}"></i>
										</div>
										<div class="col-sm-10">
											<input type="url" ng-model="profile.url" placeholder="URL" ng-model-options="{allowInvalid:true}" name="socialurl">
											<div ng-messages="localbusiness_form.socialurl.$error" role="alert">
												<div ng-message="url">Invalid time</div>
											</div>
										</div>
										<div class="col-sm-1">
											<md-button ng-click="delSocialProfile($index)" class="md-fab md-mini bg-danger"><i class="mdi mdi-minus"></i>
											</md-button>
										</div>
									</div>

								</md-input-container>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<md-input-container>
										<textarea ng-model="localbusiness.additonal_schema" rows="3" name="additonalSchema" placeholder="Additional Schema" autocomplete="off"></textarea>
									</md-input-container>
								</div>
							</div>
						</div>

						<br class="visible-sm visible-xs">
						<div class="col-sm-5">
<pre class="prettyprint" ng-controller="prettyPrint">
&lt;script type="application/ld+json"&gt;
{
  "@context": "https://schema.org",
  "@type": "<propvalue ng-bind="localbusiness.type2.name || localbusiness.type1.name || 'LocalBusiness'"></propvalue>",
  "name": "<propvalue ng-bind="localbusiness.name"></propvalue>",
  "url": "<propvalue ng-bind="localbusiness.url"></propvalue>",
  "logo": "<propvalue ng-bind="localbusiness.logo"></propvalue>",
  "image": "<propvalue ng-bind="localbusiness.img"></propvalue>",
  "telephone": "<propvalue ng-bind="localbusiness.phone"></propvalue>"<span ng-if="localbusiness.social_profiles.length > 0">,
  "sameAs": <span ng-if="localbusiness.social_profiles.length > 1">[
    </span><span ng-repeat="profile in localbusiness.social_profiles">"<propvalue ng-bind="profile.url"></propvalue>"<span ng-if="$index !== (localbusiness.social_profiles.length-1)">,
    </span></span><span ng-if="localbusiness.social_profiles.length > 1">
  ]</span></span>,
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<propvalue ng-bind="localbusiness.location.street"></propvalue>",
    "addressLocality": "<propvalue ng-bind="localbusiness.location.city"></propvalue>"<span ng-if="localbusiness.location.state">,
    "addressRegion": "<propvalue ng-bind="localbusiness.location.state"></propvalue>"</span>,
    "postalCode": "<propvalue ng-bind="localbusiness.location.zip"></propvalue>",
    "addressCountry": "<propvalue ng-bind="localbusiness.location.country"></propvalue>"
  }<span ng-if="localbusiness.review_count || localbusiness.rating_value">,
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<propvalue ng-bind="localbusiness.rating_value"></propvalue>",
    "reviewCount": "<propvalue ng-bind="localbusiness.review_count"></propvalue>"
  }</span><span ng-if="localbusiness.geo.latitude || localbusiness.geo.longitude">,
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": <propvalue ng-bind="localbusiness.geo.latitude"></propvalue>,
    "longitude": <propvalue ng-bind="localbusiness.geo.longitude"></propvalue>
  }</span><span ng-if="!localbusiness.open247"><span ng-if="localbusiness.hoursspecs.length > 0">,
  "openingHoursSpecification":</span> <span ng-if="localbusiness.hoursspecs.length > 1">[</span><span ng-repeat="hoursspec in localbusiness.hoursspecs">{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": <span ng-if="hoursspec.days.length > 1">[
      </span><span ng-repeat="day in hoursspec.days">"<propvalue ng-bind="day"></propvalue>"<span ng-if="$index !== (hoursspec.days.length-1)">,
      </span></span><span ng-if="hoursspec.days.length > 1">
    ]</span>,
    "opens": "<propvalue ng-bind="hoursspec.opens"></propvalue>",
    "closes": "<propvalue ng-bind="hoursspec.closes"></propvalue>"
  }<span ng-if="$index !== (localbusiness.hoursspecs.length-1)">,</span></span><span ng-if="localbusiness.hoursspecs.length > 1">]</span></span><span ng-if="localbusiness.open247">,
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  }</span><span ng-if="localbusiness.additonal_schema">,
  <propvalue ng-bind="localbusiness.additonal_schema"></propvalue></span>
}
&lt;/script&gt;
</pre>
						</div>

						<button type="button" class="hide" id="reset_schema_btn" ng-click="reset_schema()">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="89de6b4a1a46323cf727bac7-|49" defer=""></script>
<script type="text/javascript">
	var angular_app_url = '<?php echo BCPLUGINURL;?>/bc-schema-master/schema-app';
	// console.log(angular_app_url);
</script>
