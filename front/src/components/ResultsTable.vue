<template>
    <div>
        <div class="row">
            
            <div class="col m6">
                <select>
                    <option value="">Froid</option>
                    <option value="">Froid inhabituel</option>
                    <option value="">Gelées tardives</option>
                    <option value="">Gelées précoces</option>
                </select>
            </div>
            <div class="col m6">
                <button class="btn">
                    Que s'est-il passé le jour de mon anniversaire ?
                </button>
            </div>
        </div>
        <div class="row">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Importance</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Durée</th>
                        <th>Type</th>
                        <th>Localisation</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                </tbody>
            </table>
        
        </div>
    </div>
</template>

<script>
export default {
    name: 'ResultsTable'
}
</script>

<style scoped>
table, th, td {
    color: black;
    padding: 0px 10px;
}

  
</style>