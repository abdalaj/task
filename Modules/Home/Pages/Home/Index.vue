<template>
    <center class="row ">
        <div class="col-12">
            <div class="card ">
                <div class="card-body ">
                    <form @submit.prevent="create" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="">{{t('title')}}</label>
                            <input type="text" class="form-control w-100" v-model="form.title">
                            <div v-if="form.errors.title" class="text-danger">
                                {{ form.errors.title }}
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">{{t('image')}}</label>
                            <input type="file" class="form-control w-100" @input="form.image = $event.target.files[0]">
                            <div v-if="form.errors.image" class="text-danger">
                                {{ form.errors.image }}
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">{{t('body')}}</label>
                            <textarea v-model="form.body" class="form-control w-100">

                            </textarea>
                            <div v-if="form.errors.body" class="text-danger">
                                {{ form.errors.body }}
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100">
                                {{t('Publish')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
    <center class="row mt-4 px-5">
        <div class="col-12 mb-3 " v-for="post in props.posts" :key="post">
            <div class="card">
                <center>
                    <img :src="post.image" style="width: 250px;" alt="" v-if="post.image">
                </center>
                <div class="card-body">
                    <div class="badge bg-success" style="color: white;position: absolute;top: 0;left: 0;"
                        v-if="post.user_id == page.props.value.auth.user.id">{{t('belongs to you')}}</div>
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.body }}</p>
                </div>
                <br>
                <button type="button" class="btn btn-danger w-25" v-if="selectedItems.length && post.user_id == page.props.value.auth.user.id" @click="bulkDelete()">
                    {{t('delete')}}
                </button>
                <h4>{{t('comments')}}</h4>
                <div v-for="comment in post.comments" style="text-align: left;border: 1px solid #ddd;"
                    class="px-2 mb-1">
                    <input type="checkbox" v-model="selectedItems" :value="comment.id">
                    {{t('user')}} - {{ comment.user.name }} <br> {{ comment.comment }}
                </div><br>
                <form @submit.prevent="createComment(post.id)">

                    <input required class="form-control" placeholder="leave your comment" v-model="comment.comment"
                        style="resize: none;overflow: hidden;">
                    </input>
                    <div v-if="comment.errors.comment" class="text-danger">
                        {{ comment.errors.comment }}
                    </div><br>
                    <button class="btn btn-primary w-100 mb-1">{{t('comment')}}</button>
                </form>
            </div>
        </div>

    </center>
</template>
<script setup>
import { Inertia } from '@inertiajs/inertia';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
const page = usePage();
const props = defineProps({
    posts: Array
})
const form = useForm({
    title: null,
    body: null,
    image: null,
})
const comment = useForm({
    comment: null
})
const create = () => {
    form.post(route('posts.store'), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset()
        }
    });
}
const createComment = (postId) => {
    comment.post(route('posts.comment.store', postId), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            comment.reset()
        }
    });
}
const selectedItems = ref([]);
const Comments = useForm({
    ids: []
})
const bulkDelete = () => {
    Comments.ids = selectedItems.value;
    Comments.delete(route('comments.delete'), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            selectedItems.value = []
            Comments.reset();
            Inertia.reload();
        },
    })
};
const language = window.language;
const t = (key) => {
    return window.t(key.toLowerCase());
};
</script>
