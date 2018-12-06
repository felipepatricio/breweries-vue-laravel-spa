<template lang="html">
    <div class="centerx">
        <vs-popup fullscreen title="fullscreen" :active.sync="'breweryDetail' + brewery.id"></vs-popup>
    </div>
</template>

<script>
	export default {
		name: "BreweryDetails",
        data() {
		    return {
		        // popup
            }
        }
	}
</script>

<style scoped>

</style>
