<template>
    <div class="container my-5 py-1">
        <h1 class="h1 text-center mt-5">Faite votre recherche</h1>
        <div class="mt-3">
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <div class="row">
                    <div class="col-md-6">
                        <b-form-group id="select-group-histEventType" label="Food:" label-for="select-histEventType">
                            <b-form-select
                                id="select-histEventType"
                                v-model="form.histEvenType"
                                :options="histEvenType"
                                style="height: 50px; border-radius: 10px"
                            ></b-form-select>
                        </b-form-group>
                    </div>

                    <div class="col-md-6">
                        <b-form-group id="select-group-duration" label="Food:" label-for="select-duration">
                            <b-form-select
                                id="select-duration"
                                v-model="form.duration"
                                :options="duration"
                                style="height: 50px; border-radius: 10px"
                            ></b-form-select>
                        </b-form-group>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mt-3">
                        <b-form-group id="select-group-location" label-for="select-location">
                            <b-form-select
                                id="select-location"
                                v-model="form.location"
                                :options="location"
                                style="height: 50px; border-radius: 10px;"
                            ></b-form-select>
                        </b-form-group>
                    </div>

                    <div class="col-md-3 mt-3">
                        <b-form-group id="select-group-importance" label-for="select-importance">
                            <b-form-select
                                id="select-importance"
                                v-model="form.importance"
                                :options="importance"
                                style="height: 50px; border-radius: 10px;"
                            ></b-form-select>
                        </b-form-group>
                    </div>

                    <div class="col-md-3 mt-3">
                        <b-form-group id="select-group-month" label-for="select-month">
                            <b-form-select
                                id="input-3"
                                v-model="form.month"
                                :options="month"
                                style="height: 50px; border-radius: 10px;"
                            ></b-form-select>
                        </b-form-group>
                    </div>

                    <div class="col-md-3 mt-3">
                        <b-form-group id="input-group-year" label-for="input-year">
                            <b-form-input
                                id="input-year"
                                v-model="form.year"
                                placeholder="Année"
                                style="height: 50px; border-radius: 10px;"
                            ></b-form-input>
                        </b-form-group>
                    </div>
                </div>

                <b-button type="submit" variant="primary" style="margin-right: 20px;  margin-top: 20px; background-color: #438491; border: none;">Rechercher</b-button>
                <b-button type="reset" variant="danger" style="margin-top: 20px; border: none;">Réinitialiser</b-button>
            </b-form>
        </div>

        <div v-if="results" class="text-dark my-5">
            <div v-for="data in results.data" :key="data">
                <b-card class="text-center mb-3">
                    <div class="col-12">
                        <span class="mr-3">{{ data.id }}</span>
                        <span class="mr-3">{{ data. }}</span>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            histEvenType: [
                { text: 'Tous les types', value: null },
                { text: 'Froid', value: 1 },
                { text: 'Froid inhabituel', value: 2 },
                { text: 'Gelées tardives', value: 3 },
                { text: 'Gelées précoces', value: 4 },
                { text: 'Épisode neigeux', value: 5 },
                { text: 'Épisode neigeux tardif', value: 6 },
                { text: 'Épisode neigeux précoce', value: 7 },
                { text: 'Pluies verglaçantes', value: 8 },
                { text: 'Épisode pluvieux', value: 9 },
                { text: 'Inondation', value: 10 },
                { text: 'Tempête/coup de vent', value: 11 },
                { text: 'Dépression extra-tropicale', value: 12 },
                { text: 'Tempête tropicale', value: 13 },
                { text: 'Cyclone', value: 14 },
                { text: 'Chaleur / canicule', value: 15 },
                { text: 'Douceur inhabituelle', value: 16 },
                { text: 'Orages', value: 17 },
                { text: 'Tornade', value: 18 },
                { text: 'Grêle', value: 19 },
                { text: 'Sécheresse', value: 20 },
                { text: 'Autres', value: 21 }
            ],
            duration: [
                { text: "Toutes les durées" },
                { text: 'Ponctuel', value: 1 },
                { text: 'Plusieurs jours',  value: 2 },
                { text: 'Plusieurs semaines', value: 3 },
                { text: 'Plusieurs  mois', value: 4 }
            ],
            location: [
                { text: 'Tous les lieux', value: null },
                { text: 'Alsace', value: 42 },
                { text: 'Aquitaine', value: 72 },
                { text: 'Auvergne', value: 83 },
                { text: 'Bourgogne', value: 26 },
                { text: 'Bretagne', value: 53 },
                { text: 'Champagne-Ardenne', value: 21 },
                { text: 'Corse', value: 94 },
                { text: 'Franche-Comté', value: 43 },
                { text: 'Île-de-France', value: 11 },
                { text: 'Languedoc-Roussillon', value: 91 },
                { text: 'Limousin', value: 74 },
                { text: 'Centre', value: 24 },
                { text: 'Lorraine', value: 41 },
                { text: 'Midi-Pyrénées', value: 73 },
                { text: 'Nord-Pas-de-Calais', value: 31 },
                { text: 'Basse-Normandie', value: 25 },
                { text: 'Haute-Normandie', value: 23 },
                { text: 'Pays de la Loire', value: 52 },
                { text: 'Picardie', value: 22 },
                { text: 'Poitou-Charentes', value: 54 },
                { text: 'PACA', value: 93 },
                { text: 'Rhône-Alpes', value: 82 },
            ],
            importance: [
                { text: 'Importance', value: null },
                { text: 'non concerné', value: -1 },
                { text: 'non défini', value: 0 },
                { text: 'anecdotique', value: 1 },
                { text: 'notable', value: 2 },
                { text: 'remarquable', value: 3 },
                { text: 'exceptionnel', value: 4 },
                { text: 'mémorable', value: 5 },
                { text: 'dépression tropicale', value: 99 },
                { text: 'tempête tropicale', value: 98 },
                { text: 'cyclone cat. 1', value: 91 },
                { text: 'cyclone cat. 2', value: 92 },
                { text: 'cyclone cat. 3', value: 93 },
                { text: 'cyclone cat. 4', value: 94 },
                { text: 'cyclone cat. 5', value: 95 },
            ],
            currentYear: new Date().getFullYear(),
            month: [
                { text: 'Mois', value: null },
                { text: 'Janvier', value: '01/01/'. currentYear },
                { text: 'Février', value: '01/02/'. currentYear },
                { text: 'Mars', value: '01/03/'. currentYear },
                { text: 'Avril', value: '01/04/'. currentYear },
                { text: 'Mai', value: '01/05/'. currentYear },
                { text: 'Juin', value: '01/06/'. currentYear },
                { text: 'Juillet', value: '01/07/'. currentYear },
                { text: 'Août', value: '01/08/'. currentYear },
                { text: 'Septembre', value: '01/09/'. currentYear },
                { text: 'Octobre', value: '01/10/'. currentYear },
                { text: 'Novembre', value: '01/11/'. currentYear },
                { text: 'Décembre', value: '01/12/'. currentYear }
            ],
            form: {
                histEvenType: null,
                duration: null,
                location: null,
                importance: null,
                month: null,
            },
            show: true,
            results: {data: []}
        }
    },
    methods: {
        async onSubmit(event) {
            event.preventDefault()
            if ( this.form.histEvenType == null && this.form.duration == null
                && this.form.location == null && this.form.importance == null
                && this.form.month == null) {
                this.$data.results = await axios.get("https://localhost/historic_events")
                console.log(this.$data.results.data)
            }
        },
        onReset(event) {
            event.preventDefault()
            // Reset our form values
            this.form.histEvenType = null
            this.form.duration = null
            this.form.location = null
            this.form.importance = null
            this.form.month = null
            // Trick to reset/clear native browser form validation state
            this.show = false
            this.$nextTick(() => {
                this.show = true
            })
        }
    }
}
</script>

<style>

    select, input {

    }

</style>