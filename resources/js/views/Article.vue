<template>
	<div class="grid-article">
    <div class="container">
        <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
          <h1 class="font-weight-bold text-dark">{{ article.name }}</h1>
          <img class="w-100 height-70" :src="article.image" />
        </div>
        <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
          
          <blockquote class="text-primary p-3 font-italic" style="border-left: 4px solid black; line-height: 2;">{{ article.description }}</blockquote>
          
          <br>
        
          <section class="mb-4">
              <!--Section heading-->
              <h2 class="h1-responsive font-weight-bold">Comment</h2>
              <div class="row">
                  <!--Grid column-->
                  <div class="col-md-9 mb-md-0 mb-5">
                      <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                          <!--Grid row-->
                          <div class="row">

                              <!--Grid column-->
                              <div class="col-md-6">
                                  <div class="md-form mb-0">
                                      <input 
                                        v-validate="'required|min:3'"
                                        data-vv-validate-on="blur"
                                        @keyup="updateValue('name',$event)" 
                                        v-model="comment.name"
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        class="form-control">
                                      <label for="name" class="">Your name</label>
                                      <span class="text-danger text-sm">{{ errors.first('name') }}</span>
                                  </div>
                              </div>
                              <!--Grid column-->

                              <!--Grid column-->
                              <div class="col-md-6">
                                  <div class="md-form mb-0">
                                      <input 
                                      v-validate="'required|email|min:3'"
                                      data-vv-validate-on="blur"
                                      @keyup="updateValue('email',$event)" 
                                      v-model="comment.email"
                                      type="text" 
                                      id="email" 
                                      name="email" 
                                      class="form-control">
                                      <label for="email" class="">Your email</label>
                                      <span class="text-danger text-sm">{{ errors.first('email') }}</span>
                                  </div>
                              </div>
                              <!--Grid column-->

                          </div>
                          <!--Grid row-->

                          <!--Grid row-->
                          <div class="row">

                              <!--Grid column-->
                              <div class="col-md-12">

                                  <div class="md-form">
                                      <textarea 
                                      v-validate="'required|min:3'"
                                      data-vv-validate-on="blur"
                                      @keyup="updateValue('comment',$event)" 
                                      v-model="comment.comment"
                                      type="text" 
                                      id="message" 
                                      name="comment" 
                                      rows="2" 
                                      class="form-control md-textarea"></textarea>
                                      <label for="message">Your Comment</label>
                                      <span class="text-danger text-sm">{{ errors.first('comment') }}</span>
                                  </div>

                              </div>
                          </div>
                          <!--Grid row-->

                      </form>

                      <div class="text-md-right">
                          <a class="btn btn-primary" :disabled="!validateForm"  @click.prevent="save" >Send</a>
                      </div>
                      <div class="status"></div>
                  </div>
                  <!--Grid column-->
              </div>
          </section>   

          <br>

          <section class="mb-4">
            <article class="row" v-for="(comment,index) in article.comments">
              <div class="col-md-2 col-sm-2 hidden-xs">
                <figure class="thumbnail">
                  <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                  <figcaption class="text-center">{{ comment.name }}</figcaption>
                </figure>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                  <div class="panel-body">
                    <header class="text-left">
                      <div class="comment-user"><i class="fa fa-user"></i> {{ comment.name }}</div>
                      <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{ comment.created_at }}</time>
                    </header>
                    <div class="comment-post">
                      <p>
                        {{ comment.comment }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </section>
        </div>
    </div>
	</div>
</template>

<script>
import { mapState } from 'vuex'

export default {
	data() {
		return {

		}
	},
	computed: {
    validateForm() {
      return !this.errors.any()
    },
		...mapState('article',['article','comment']),
	},
	watch:{
  	},
	methods: {
		fetchArticle() { 
			this.$store.dispatch('article/fetchArticle',this.$route.params.articleId)
		},
    updateValue(key,$event){
      const payload = {key:key, value:$event.target.value}
      this.$store.dispatch('article/setCommentKey',payload)
    },
    save(){
      if(!this.validateForm) return
      var _this = this
      this.$store.dispatch('article/createComment',this.$route.params.articleId)
        .then((response) => { 
          this.$store.dispatch('article/fetchArticle',this.$route.params.articleId)
        })
        .catch(error => 
        { 
            if(error.response.status == 422) //validation error
            {
                // Add errors to VeeValidate Error Bag
                var entries = Object.entries(error.response.data.data);
                entries.forEach(function(item, index) {
                    _this.errors.add({
                        field: item[0],
                        msg: item[1][0]
                    });
                });
            }
        })
    }
	},
	mounted(){
		this.fetchArticle()
	}
}
</script>

<style type="text/css">
.grid-article{
  background-color: #fff;
  border-radius: 20px;
  padding: 20px;
}
.height-70{
  height: 400px;
}

</style>