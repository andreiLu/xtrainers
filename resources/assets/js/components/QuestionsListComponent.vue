<template>
    <div class="right-section main-section">
        <div class="questions-list">
            <div class="single-question" v-for="topic in topics">
                <p class="topic-title"> {{topic.topic_title}} </p>

                <div class="topic-content">
                    <p>{{topic.topic_content}}</p>
                </div>
            </div>
        </div>
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

    .questions-list{
        margin: 40px;
    }

    .single-question{
        border: 1px dashed #ffffff52;
        padding: 15px;
        margin-bottom: 20px;
        max-width: 70%  ;
    }

    .topic-title{
        font-size: 40px;
        color: white;
        font-style: normal;
    }

    .topic-content{
        font-size: 20px;
        color: white;
        font-style: normal;
    }

</style>