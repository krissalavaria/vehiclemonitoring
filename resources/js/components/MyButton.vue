<template>
    <div>
        <button :type="type" class="my-button btn btn-primary" v-text="text">Button</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: [
            'text',
            'type'
        ]
    }
</script>
