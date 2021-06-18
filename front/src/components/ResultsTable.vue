<template>
    <div>
        <div class="row">
            
            <div class="col m6">
                <select >
                    <option value="">Froid inhabituel</option>
                    <option value="">Cyclone</option>
                    <option value="">Gelées précoces</option>
                    <option value="">Orages</option>
                    <option value="">Tempête tropicales</option>
                    <option value="">Tornade</option>
                </select>
            </div>
            <div class="col m6">
                <button class="btn">
                    Que s'est-il passé le jour de mon anniversaire ?
                </button>
            </div>
        </div>
        <div class="row">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Importance</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Durée</th>
                        <th>Type</th>
                        <th>Localisation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="event in events" :key="event.id">
                        <td><a href="" >{{ event.nom == '' ? '-' : event.nom }}</a></td>
                        <td>{{ event.importance  }}</td>
                        <td>{{ formatDt(new Date(event.dateDeb)) }}</td>
                        <td>{{ formatDt(new Date(event.dateFin)) }}</td>
                        <td>{{ event.duree }}</td>
                        <td>
                            <ul>
                                <li style="list-style-type: circle;" v-for="type in enumerateToArray(event.type)" :key="type">
                                    {{ types.get(parseInt(type)) }}
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li style="list-style-type: circle;" v-for="localisation in enumerateToArray(event.localisation)" :key="localisation">
                                    {{ localisations.get(parseInt(localisation)) != null ?  localisations.get(parseInt(localisation))  : 'Introuvable' }}
                                </li>
                            </ul>
                        </td>
                    </tr>

                </tbody>
            </table>
        
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { eventTypes,  localisations } from './utils/Tableaux';
import DateUtils from './utils/DateUtils';

export default {
    name: 'ResultsTable',
    data() {
        return {
            events: [],
            types: eventTypes,
            localisations: localisations 
        }
    },
    async mounted() {
       let res = await axios.get('https://localhost/historic_events');
       this.events = res.data;
       console.log(DateUtils);
    },
    methods: {
        enumerateToArray(types) {
            return types.split(',');
        },
        formatDt(dt) {
            return DateUtils.formatDate(dt, 'dd/MM/yyyy')
        }
    }
}


</script>
<style scoped>
table, th {
    color: black;
}
a {
    color: blue;
    line-height: unset ;
}
td {
    padding: 15px 10px;
    line-height: 25px; 
    word-wrap: break-word;
    max-width: 150px;
}
select {
    display: block;
    margin-top: 13px;
}

</style>