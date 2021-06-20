<template>
  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="../../../public/img/image 1.png" alt="" />
                  </div>
                  <div class="down-content">
                    <span>Lifestyle</span>
                    <a href="#"
                      ><h4>Donor Darah Bondowoso</h4></a
                    >
                    <ul class="post-info">
                      <li><a href="#">Admin</a></li>
                      <li><a href="#"> Created at May 31, 2020</a></li>
                      <li><a href="#">Taylor Swift</a></li>
                    </ul>
                    <p>
                      Stand Blog is a free HTML CSS template for your CMS theme.
                      You can easily adapt or customize it for any kind of CMS
                      or website builder. You are allowed to use it for your
                      business. You are NOT allowed to re-distribute the
                      template ZIP file on any template collection site for the
                      download purpose. for more info. Thank you.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <recent-blog />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import recentBlog from "../BlogContainer/RecentBlog.vue";
export default {
  name: "ContentBlog",
  components: {
    recentBlog,
  },
};
</script>
