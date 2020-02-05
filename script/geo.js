// Custom Map Style | Follow Template.
				// [Latitude, longitude]
				var customMapCenter = [39.109998, -101.161796];
				//VB [36.7671604, -76.3278514]
				//Fred [38.2983313, -77.5249065]
				var customZoom = 4;
				// Custom Map Style | Follow API - https://developers.google.com/maps/documentation/javascript/styling?hl=en
				var customStyle = [{"featureType": "administrative","elementType": "all","stylers": [{"visibility": "simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#fffffa"}]},{"featureType":"water","stylers":[{"lightness":50}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"lightness":40}]}];

				// Array of Locations | Follow Template.
				var locations = [
					{
						title:'Point 1',
						icon:'item1',
						category:'work',
						address:'',
						image:'https://unsplash.it/1000/500?image=932',
						latitude:'36.834816',
						longitude:'-76.137242',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 2',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=123',
						latitude:'38.272186',
						longitude:'-77.458163',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 3',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=823',
						latitude:'28.417689',
						longitude:'-81.581165',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 4',
						icon:'item1',
						category:'work',
						address:'',
						image:'https://unsplash.it/1000/500?image=438',
						latitude:'40.727160',
						longitude:'-73.979332',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 5',
						icon:'item1',
						category:'work',
						address:'',
						image:'https://unsplash.it/1000/500?image=583',
						latitude:'40.288564',
						longitude:'-76.653634',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 6',
						icon:'item1',
						category:'work',
						address:'',
						image:'https://unsplash.it/1000/500?image=458',
						latitude:'36.404432',
						longitude:'-86.821656',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 7',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=1023',
						latitude:'44.092397',
						longitude:'-103.236023',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 8',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=643',
						latitude:'39.209685',
						longitude:'-106.840274',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 9',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=432',
						latitude:'39.209685',
						longitude:'-106.840274',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 10',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=223',
						latitude:'39.749384',
						longitude:'-104.951329',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
					{
						title:'Point 11',
						icon:'item1',
						category:'play',
						address:'',
						image:'https://unsplash.it/1000/500?image=112',
						latitude:'35.345029',
						longitude:'-120.664154',
						description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat. Duo Reges: constructio interrete. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Placet igitur tibi, Cato, cum res sumpseris non concessas, ex illis efficere, quod velis? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Cetera illa adhibebat, quibus demptis negat se Epicurus intellegere quid sit bonum. Itaque contra est, ac dicitis; Id enim natura desiderat. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. Nam adhuc, meo fortasse vitio, quid ego quaeram non perspicis. Tum ille: Ain tandem? Negabat igitur ullam esse artem, quae ipsa a se proficisceretur; Invidiosum nomen est, infame, suspectum. Restatis igitur vos; Intellegi quidem, ut propter aliam quampiam rem, verbi gratia propter voluptatem, nos amemus; Quid enim est a Chrysippo praetermissum in Stoicis? Beatus sibi videtur esse moriens. Quid, si etiam iucunda memoria est praeteritorum malorum? Eadem nunc mea adversum te oratio est.'
					},
				];
				console.log(locations);
				// Dynamically generated
				var categoriesTids = [];
				var categories = [];
				var gmarkers = [];
				var gmarkersTitle = [];
				var markers = [];
				var map;

				function initialize() {
					var mapCanvas = document.getElementById('map');
					var mapOptions = {
						center: new google.maps.LatLng(customMapCenter[0], customMapCenter[1]),
						zoom: customZoom,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						styles: customStyle,
						disableDefaultUI: true,
						zoomControl: true
					};
					var infowindow = new google.maps.InfoWindow;
					map = new google.maps.Map(mapCanvas, mapOptions);

					for (i = 0; i < locations.length; i++) {
						marker = new google.maps.Marker({
									position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
									 title: locations[i].title,
									 address: locations[i].address,
 									 image: locations[i].image,
									 description: locations[i].description,
									 map: map,
									 category:locations[i].category,
							});
							gmarkers.push(marker);
							gmarkersTitle.push(locations[i].title);
							// On Click Move to clicked marker and Show content
							google.maps.event.addListener(marker, 'click', (function(marker, i) {
									 return function() {
                      var div = map.getDiv();
											map.panTo(this.getPosition());
                      map.panBy(div.offsetWidth/5, div.offsetHeight/100);
                      $('.slideOut').addClass('active');
                      $('.contentSection').addClass('active');
                     	setContent(this);
                     

											//  map.setZoom(15);
									 }
							})(marker, i));
            google.maps.event.addListener(map, 'click', function(){
                    $('.slideOut').removeClass('active');
                    $('.contentSection').removeClass('active');
            });
            google.maps.event.addListener(map, 'dragend', function(){
                    $('.slideOut').removeClass('active');
                    $('.contentSection').removeClass('active');
            });


						}
						initializeFirstMarker();
						$('.next-item').click(function(event) {
							nextMarker();
						});
						$('.previous-item').click(function(event) {
							previousMarker();
						});
					}
					function resetMarkerIcons() {
							 //  reset all the icons back to normal except the one you clicked
							 for (var i = 0; i < gmarkers.length; i++) {
								 if(gmarkers[i].category == 'history'){
		 							gmarkers[i].setIcon("http://www.visitfred.com/sites/all/themes/fred/images/historichops_OG_white.png");
		 						} else{
		 							gmarkers[i].setIcon("http://www.visitfred.com/sites/all/themes/fred/images/hops-icon.png");
		 						}
							 }

					}
					function initializeFirstMarker() {
						var i = Math.floor((Math.random() * gmarkers.length) + 0);
						var thisMarker = gmarkers[i];
						setContent(thisMarker);

					}
					function nextMarker() {
						var thisMarkerTitle = $('.header-block h1').attr('title');
						var i = gmarkersTitle.indexOf(thisMarkerTitle);
						console.log(gmarkersTitle.length - 1);
						console.log('old'+i);
						if(gmarkersTitle.length - 1 == i){
							i = 0
						} else{
							i = i + 1;
						}
						console.log('new'+i);
						var thisMarker = gmarkers[i];
						setContent(thisMarker);
						map.panTo(thisMarker.getPosition());
					}
					function previousMarker() {
						var thisMarkerTitle = $('.header-block h1').attr('title');
						var i = gmarkersTitle.indexOf(thisMarkerTitle);
						if(0 == i){
							i = gmarkersTitle.length - 1;
						} else{
							i = i - 1;
						}
						var thisMarker = gmarkers[i];
						setContent(thisMarker);
						map.panTo(thisMarker.getPosition());
					}
					