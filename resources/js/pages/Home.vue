<template>
    <v-app>
        <v-btn>
        {{hello}}
        </v-btn>
    </v-app>
</template>
<script>
export default {
    props:["hello"]
}
</script>