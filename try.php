<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.9.1/d3.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js"></script>
    <style>
      // original
@text: #FFF;
@light: #16a8d3;
@medium: #006196;
@dark: #000;

// // blue
// @light: #30E3CA; // #16a8d3
// @medium: #11999E; // #006196
// @dark: #40514E; // #000;

// // blue-green
// //@text: #A4E5D9;
// @light: #C8F4DE;
// @medium: #66C6BA;
// @dark: #649DAD;

// // green
// @text: #196B69;
// @light: #DDFEE4;
// @medium: #28CC9E;
// @dark: #132F2B;

// // another blue
// @text: #ECF0F1;
// @light: #2980B9;
// @medium: #33CCCC;
// @dark: #2C3E50;

// // purple
// @text: #ECF0F1;
// @light: #BB99CD;
// @medium: #643579;
// @dark: #3D1860;

// // blue-gray
// @dark: #263849;
// @medium: #41506B;
// @medium: #35BCBF;
// @light: #90F6D7;

@dark: saturate(lighten(#F59D2A,5%),20%);
@medium: #EE7738;
//@dark: #2C3D4F;
@light: #34495D;

@import url('https://fonts.googleapis.com/css?family=Oswald');

html { height: 100%; display: flex; }
body { margin: auto; }

html { 
  background: @light; 
  text-align: center; 
  color: @text; 
  font-family: 'Oswald', sans-serif;
  font-weight: 300;
  font-smooth: auto;
  -webkit-font-smoothing: antialiased;
}

@spacing-base: 2rem;

.mileage__calculations { 
  margin: 0;
  font-size: 3rem;
  font-weight: inherit;
  small { font-size: 0.6em; color: @dark; } 
}

.mileage-map {
  display: block;
  width: auto;
  height: auto;
  max-width: 90%;
  max-height: 90vh;
  margin: auto auto 2rem;
  overflow: visible;
}

.mileage-map__states {
  stroke: @light;
  stroke-width: 2;
  fill: @medium;
}

.marker {
  fill: @dark;
  stroke: @text;
  stroke-width: 5;
  cursor: pointer;
  transition: opacity 0.3s linear;
  user-select: none;
  > * { transition: transform 0.3s cubic-bezier(.6,.0,.5,1); }

  text {
    stroke: none;
    fill: @text;
    font-family: inherit;
    font-size: 28px;
    font-weight: 200;
  }
}

.marker-fade {
  &-leave-active,
  &-enter-active { 
    transition: opacity .3s linear;
  }

  &-enter, 
  &-leave-to {
    opacity: 0;
  }
}

.marker--current {
  opacity: 0.8;
  pointer-events: none;

  > * { transform: scale(0.8); }
}

/* ////////////////////////////////////////////////////////////////////////// */

.airport { fill: #FFF; stroke-width: 2; stroke: transparent; transition: stroke 0.3s linear; }
.airport:hover { stroke: rgba(255,255,255,0.3); }
.airport--current,
.airport--current:hover { stroke: #FFF; stroke: rgba(255,255,255,0.8); }

.airport__range {
  fill: transparent;
  cursor: pointer;
}



////////////////////////////////////////


.marker-connector {
  fill: none;
  stroke: #FFF;
  stroke-width: 3;
  stroke-dasharray: 6 6;
  pointer-events: none;

  animation: marching-ants 1s linear 0s infinite;
}

@keyframes marching-ants {
  from { stroke-dashoffset: 0; }
  to { stroke-dashoffset: 12; }
}


.airplane {
  pointer-events: none;
  fill: #FFF;
  //stroke: @medium;
  //stroke-width: 0.5;
  opacity: 0;
}

    </style>
    <script>
       console.clear();

new Vue({

  el: '#app',

  data: () => ({
    distance: null,
    airports: [],
    currentAirport: null,
    lastAirport: null,
    markers: [
      {
        airport: null,
        x: 200,
        y: 300,
        startX: 0,
        startY: 0,
        fill: '#f47825',
        current: false
      },
      {
        airport: null,
        x: 500,
        y: 100,
        startX: 0,
        startY: 0,
        fill: '#00b26b',
        current: false
      }
    ]
  }),

  filters: {
    numberWithCommas(val) {
      return ( val && val.toString ? val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : val );
    }
  },

  mounted() {

    // D3 Projection
    var projection = d3.geoAlbersUsa().scale([1500]); // scale things down so see entire US
    this.projection = projection;

    // D3 US States map
    fetch('https://s3-us-west-2.amazonaws.com/s.cdpn.io/39255/us-states.json')
      .then( response => response.json() )
      .then( (states) => {

      // Define path generator
      var path = d3.geoPath() // path generator that will convert GeoJSON to SVG paths
      .projection(projection); // tell path generator to use albersUsa projection

      // Bind the data to the SVG and create one path per GeoJSON feature
      d3.select( this.$refs.states )
        .selectAll("path")
        .data(states.features)
        .enter()
        .append("path")
        .attr("d", path);
    });

    // Airports
    fetch('https://s3-us-west-2.amazonaws.com/s.cdpn.io/39255/airports.json')
      .then( response => response.json() )
      .then( (airports) => {

      // Let's only focus on the top 100
      airports = airports.slice(0,100);
      var i = airports.length, d, proj;

      while(i--){
        d = airports[i];
        proj = projection([d.Lng, d.Lat]);

        if ( proj ) {
          d.x = proj[0];
          d.y = proj[1];
        } else {
          airports.splice(i, 1);
        }
      }

      this.airports = airports.reverse();

      var la = null;

      this.markers.forEach((marker)=>{
        var ra = this.randomAirport();
        if ( ra == la ) { ra = this.randomAirport(); }
        la = ra;
        marker.airport = ra;
        marker.x = ra.x;
        marker.y = ra.y;
      });
      this.markerDistance();
    });


  },

  methods: {

    randomAirport(){
      return this.airports[ Math.floor(Math.random() * this.airports.length) ];
    },

    markerSet(e, marker){
      if ( e ) { e.preventDefault(); }

      marker = marker || this.markers[0];
      marker.airport = null;
      marker.current = true;
      marker.startX = marker.x;
      marker.startY = marker.y;

      this.currentAirport = null;
      this.currentMarker = marker;

      if ( this.airplaneTween ) {

        var oldTween = this.airplaneTween;

        var tl = new TimelineLite();
        tl.to(this.$refs.airplane,0.2,{
          opacity: 0,
          ease: "Linear.easeNone",
          onComplete: function(){
            if ( oldTween ) { oldTween.kill(); }
          }
        });

        this.airplaneFade = tl;
      }

      this.markerDrag(e);
      document.addEventListener('mousemove',this.markerDrag);
      document.addEventListener('mouseup', this.markerStop);
      this.$refs.map.addEventListener('mouseleave', this.markerLeave);
    },

    markerDrag(e){
      this.currentMarker.airport = this.currentAirport;

      if ( this.currentAirport ) {
        this.currentMarker.x = this.currentAirport.x;
        this.currentMarker.y = this.currentAirport.y;
      } else {
        d3.event = e;
        var mouse = d3.mouse(this.$refs.map);
        this.currentMarker.x = mouse[0];
        this.currentMarker.y = mouse[1];
      }
      this.markerDistance();
    },

    markerLeave(){
      this.currentMarker.x = this.currentMarker.startX;
      this.currentMarker.y = this.currentMarker.startY;

      this.markerStop();
    },

    markerStop(){
      console.log('stop!');
      document.removeEventListener('mousemove',this.markerDrag);
      document.removeEventListener('mouseup', this.markerStop);
      this.$refs.map.removeEventListener('mouseleave', this.markerLeave);

      this.currentMarker.current = false;
      this.currentMarker = null;

      this.markerDistance();
    },

    markerConnect(){
      var m1 = this.markers[1],
          m2 = this.markers[0];

      if ( m1.x < m2.x ) {
        m1 = this.markers[0];
        m2 = this.markers[1];
      }

      var dx = m2.x - m1.x,
          dy = m2.y - m1.y,
          dr = Math.sqrt(dx * dx + dy * dy);

      return "M" + m2.x + "," + m2.y + "A" + dr + "," + dr + " 0 0,1 " + m1.x + "," + m1.y ;
    },

    calcDistance(lat1, lon1, lat2, lon2, unit) {
      var radlat1 = Math.PI * lat1/180
      var radlat2 = Math.PI * lat2/180
      var theta = lon1-lon2
      var radtheta = Math.PI * theta/180
      var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
      dist = Math.acos(dist)
      dist = dist * 180/Math.PI
      dist = dist * 60 * 1.1515
      if (unit=="K") { dist = dist * 1.609344 }
      if (unit=="N") { dist = dist * 0.8684 }
      return dist;

    },

    markerDistance(){
      var marker1 = this.markers[0];
      var latLng1 = this.projection.invert([ marker1.x, marker1.y ]).reverse();

      var marker2 = this.markers[1];
      var latLng2 = this.projection.invert([ marker2.x, marker2.y ]).reverse();

      this.distance = Math.round( this.calcDistance(latLng1[0], latLng1[1], latLng2[0], latLng2[1]) );
      this.airplaneAnimate();
    },

    airportSnap(e, airport){
      if ( airport !== this.currentAirport ) {
        airport.current = true;
        this.currentAirport = airport;
        if ( this.currentMarker ) { this.currentMarker.airport = airport; }
      }
    },

    airportClick(e,airport){
      if ( !this.currentMarker ) { this.markerSet(e); }
      this.currentAirport = airport;
      this.currentMarker.x = this.currentAirport.x;
      this.currentMarker.y = this.currentAirport.y;
      if ( this.currentMarker ) { this.currentMarker.airport = airport; }
    },

    airportLeave(e,airport){
      airport.current = false;
      this.currentAirport = null;
      this.lastAirport = airport;
    },

    airplaneAnimate(){
      var path = this.markerConnect();
      var newTween = new TimelineMax({ repeat: -1, delay: -0.2 });
      var duration = Math.min( this.distance / 80, 15 );
      var opacityDuration = Math.min(duration * 0.2, 0.3);

      if ( this.airplaneFade && this.airplaneFade.isActive() ) {
        newTween.pause();

        this.airplaneFade.eventCallback('onComplete',function(){
          newTween.play();
        });
      } else if ( this.airplaneTween ) {
        this.airplaneTween.kill();
      }

      var bez = MorphSVGPlugin.pathDataToBezier(path)

      newTween.to(this.$refs.airplane, duration, {
        bezier: {
          values: bez,
          curviness: 1,
          autoRotate: -90,
          type:"cubic"
        },
        reversed: true,
        ease: Linear.easeNone
      }, 0);

      newTween.fromTo(this.$refs.airplane, opacityDuration, {
        opacity: 0
      },{
        opacity: 1,
        delay: opacityDuration/2,
        ease: "Linear.easeNone"
      }, 0);

      newTween.to(this.$refs.airplane, opacityDuration, {
        opacity: 0,
        ease: 'Linear.easeNone'
      }, '-='+opacityDuration);

      this.airplaneTween = newTween;
    },

  }
});
    </script>
    
</head>
<body>
<div id="app" class="mileage">

  <svg class="mileage-map" ref="map" width="1200" height="780" viewBox="-120 -180 1200 780">

    <g class="mileage-map__states" ref="states"></g>

    <g ref="airports">
      <g class="airport" :class="{ 'airport--current' : airport.current }"
         v-for="airport in airports">
        <circle r="3" :cx="airport.x" :cy="airport.y" class="airport__marker" />
        <circle r="16" :cx="airport.x" :cy="airport.y" class="airport__range"
                @mousemove="airportSnap($event, airport)"
                @mouseup="airportClick($event, airport)"
                @mouseleave.self="airportLeave($event, airport)" />
      </g>
    </g>

    <path class="marker-connector" :d="markerConnect()"></path>

    <g class="airplane" ref="airplane">
      <path class="airplane__icon" d="M21 15.984l-8.016-2.484v5.484l2.016 1.5v1.5l-3.516-0.984-3.469 0.984v-1.5l1.969-1.5v-5.484l-7.969 2.484v-1.969l7.969-5.016v-5.484c0-0.844 0.656-1.5 1.5-1.5s1.5 0.656 1.5 1.5v5.484l8.016 5.016v1.969z" transform="translate(-8,-15) scale(1.2)"></path>
    </g>

    <g v-for="marker in markers" @mousedown="markerSet($event,marker)" class="marker" :class="{ 'marker--current' : marker.current }" :transform="'translate('+marker.x+','+marker.y+')'">
      <path fill="{{marker.fill}}" d="M0 0l28.592-28.592c15.78-15.78 15.908-41.24.128-57.02a40.424 40.424 0 0 0-57.124 57.2z"></path>
      <transition name="marker-fade">
        <text v-if="marker.airport" x="0" y="-42" text-anchor="middle" v-text="marker.airport.LocationID"></text>
      </transition>
    </g>
  </svg>

  <h1 class="mileage__calculations" v-show="distance">
    <span>{{ distance | numberWithCommas }}</span><small>mi</small>
  </h1>
  
  <div class="mileage__instructions">Drag the markers around to calculate distance</div>

</div>
</body>
</html>