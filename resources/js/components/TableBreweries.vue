<template lang="html">
    <div>
        <vs-table max-items="5" pagination :data="breweries">
            <template slot="header">
                <h3>breweries</h3>
            </template>
            <template slot="thead">
                <vs-th>Name</vs-th>
                <vs-th>Brewery Type</vs-th>
                <vs-th>Phone</vs-th>
                <vs-th>Website</vs-th>
                <vs-th>City/State</vs-th>
                <vs-th>Country</vs-th>
                <vs-th>Details</vs-th>
            </template>
            <template slot-scope="{data}">
                <vs-tr v-for="(brewery, index) in data" :key="index">
                    <vs-td :data="brewery.name">
                        {{brewery.name}}
                    </vs-td>

                    <vs-td :data="brewery.brewery_type">
                        {{brewery.brewery_type}}
                    </vs-td>

                    <vs-td :data="brewery.phone">
                        {{brewery.phone}}
                    </vs-td>

                    <vs-td :data="brewery.website">
                        {{brewery.website}}
                    </vs-td>
                    <vs-td :data="brewery.city">
                        {{brewery.city}}/{{brewery.state}}
                    </vs-td>
                    <vs-td :data="brewery.country">
                        {{brewery.country}}
                    </vs-td>
                    <vs-td>
                        <vs-button color="primary" type="border" @click="'breweryDetail'+brewery.id">
                            <vs-icon icon="details"></vs-icon>
                        </vs-button>
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
    </div>

</template>

<script>
  export default {
    name: "TableBreweries",
    props: {
      source: {
        type: [String, Array]
      }
    },
    data () {
      return {
        breweries : []
      }
    },
    mounted () {
      this.getBreweries()
    },
    computed: {

    },
    methods: {
      getBreweries() {
        fetch('/breweries')
          .then(response => response.json()
            .then( breweries => {
                if (typeof breweries === 'object') {
                    this.breweries = breweries;
                    console.log(this.breweries)
                }
            })
          )
          .catch(error => console.error('Error: ', error))
      }
    }
  }
</script>

<style scoped>

</style>
