<template>
    <div>
        <p v-for="topic in topics"> {{topic.topic_title}} </p>
    </div>
</template>

<script>
    export default {
        name: "QuestionsListComponent",
        data: function() {
            return {
                topics: ''
            }
        },
        methods: {
            getAllTopics: function () {
                let self = this;
                axios.get('all-questions')
                    .then(function (response) {
                        self.topics = response.data;
                    })
                    .catch(function (error) {
                        resultElement.innerHTML = generateErrorHTMLOutput(error);
                    });
            }
        },
        mounted: function () {
            this.getAllTopics();
        }
    }
</script>

<style scoped>

</style>