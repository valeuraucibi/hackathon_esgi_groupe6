<template>
  <div style="height: 50vh; width: 30vw; margin: 0 auto;">
    <l-map
      :zoom="zoom"
      :center="center"
      @move="log('move')"
    >
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      ></l-tile-layer>
      <l-control-layers />
      <l-geo-json
        :geojson="geojson"
        :options="options"
        :options-style="styleFunction"
      />
    </l-map>
  </div>
</template>
<script>
import {
  LMap,
  LTileLayer,
  LControlLayers,
  LGeoJson
} from "vue2-leaflet";
import "leaflet/dist/leaflet.css";
import { latLng } from "leaflet";
import axios from 'axios';

export default {
  name: "Map",
  components: {
    LMap,
    LTileLayer,
    LControlLayers,
    LGeoJson
  },
  data() {
    return {
      center: latLng(46.227638, 2.213749),
      zoom: 5,
      iconWidth: 25,
      iconHeight: 40,
      geojson: null,
      fillColor: '#e4ce7f',
      bounds: null,
      enableTooltip: true,
    };
  },
  computed: {
    iconUrl() {
      return `https://placekitten.com/${this.iconWidth}/${this.iconHeight}`;
    },
    iconSize() {
      return [this.iconWidth, this.iconHeight];
    },
    styleFunction() {
      const fillColor = this.fillColor; // important! need touch fillColor in computed for re-calculate when change fillColor
      return () => {
        return {
          weight: 2,
          color: "#ECEFF1",
          opacity: 1,
          fillColor: fillColor,
          fillOpacity: 1
        };
      };
    },
    
    onEachFeatureFunction() {
      /* if (!this.enableTooltip) {
        return () => {};
      } */
      return (feature, layer) => {
        layer.on({
          click: async function() {
            let regionCode = feature.properties.code;
            let res = await axios.get('https://localhost/historic_events?localisation='+regionCode);
            console.log(res);          
          }
        })
        layer.bindTooltip(
          "<div>code:" +
            feature.properties.code +
            "</div><div>nom: " +
            feature.properties.nom +
            "</div>",
          { permanent: false, sticky: true }
        ); 
      };
    },
    options() {
      return {
        onEachFeature: this.onEachFeatureFunction
      };
    },
  },
  async created() {
    const response = await fetch("https://rawgit.com/gregoiredavid/france-geojson/master/regions-version-simplifiee.geojson")
    const data = await response.json();
    //this.bounds = data.geometry.coordinates;
    this.geojson = data;
    console.log(data)
  },
  methods: {
    log(a) {
      console.log(a);
    },
    changeIcon() {
      this.iconWidth += 2;
      if (this.iconWidth > this.iconHeight) {
        this.iconWidth = Math.floor(this.iconHeight / 2);
      }
    },
    

  },
};
</script>

<style>
/* .leaflet-control-container{
    display: none;
} */
</style>