<template>
    <div>
        <button class="btn btn-primary ms-4" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(
                        response =>{
                            alert(response.data)
                        }
                    )
            }
        }
    }
</script>
