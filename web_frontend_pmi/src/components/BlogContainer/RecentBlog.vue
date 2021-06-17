<template>
  <div class="sidebar-blog">
    <div class="row">
      <div class="col-lg-12">
        <div class="sidebar-blog-item search">
          <form id="search_form" name="gs" method="GET" action="#">
            <input
              type="text"
              name="q"
              class="searchText"
              placeholder="type to search..."
              autocomplete="on"
            />
          </form>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-blog-item recent-posts">
          <div class="sidebar-blog-heading">
            <h2>Recent Posts</h2>
          </div>
          <div class="content">
            <ul>
              <li>
                <a href="post-details.html">
                  <h5>
                    Vestibulum id turpis porttitor sapien facilisis scelerisque
                  </h5>
                  <span>May 31, 2020</span>
                </a>
              </li>
              <li>
                <a href="post-details.html">
                  <h5>
                    Suspendisse et metus nec libero ultrices varius eget in
                    risus
                  </h5>
                  <span>May 28, 2020</span>
                </a>
              </li>
              <li>
                <a href="post-details.html">
                  <h5>
                    Swag hella echo park leggings, shaman cornhole ethical
                    coloring
                  </h5>
                  <span>May 14, 2020</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:"recentBlog"
}
</script>
