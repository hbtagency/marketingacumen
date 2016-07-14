<?php
/*
* Template Name: Blog React Template
*/
get_header(); ?>

<script src="https://fb.me/react-15.2.0.js"></script>
<script src="https://fb.me/react-dom-15.2.0.js"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
-->
  <div class="wrap-content container general-content">
    <div class="site-content">
      <section id="primary" class="content-area row clearfix">
        <div class="col-xs-12">
        <main id="main" class="site-main">
         <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <article class="clearfix" id="post-<?php the_ID(); ?>" <?php //post_class(); ?> role="article">
              <header class="entry-header clearfix">
                <h2><?php the_title(); ?></h2>
                <div id="category-dropdown" class="category-dropdown"></div>
              </header>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </article>
          <?php endwhile;
        } else { ?>
          <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
              <h2><?php _e( 'Not found', 'voidx' ); ?></h2>
            </header>
            <div class="entry-content">
              <p><?php _e( 'Sorry, but your request could not be completed.', 'voidx' ); ?></p>
              <?php get_search_form(); ?>
            </div>
          </article>
        <?php } ?>
        </main>
        </div>
      </section>
      
      <section id="blog-area" class="blog-area">
      </section>     
    </div>

  </div>


<!--dangerouslySetInnerHTML={{__html: post.content.rendered} } 
<script type="text/babel">
    class Posts extends React.Component{
        constructor(props){
            super(props);
            this.state = { "posts": this.props.posts_data};
        }
        
        changeState(posts){
            this.setState({posts})
        }
        
        render(){
            return(
                <div>
                    {
                        this.state.posts.map(post =>
                             <Post post_data={post} key={post.id}/> )
                    }
                </div>
            );
        }
    }    
    
    class Post extends React.Component{
        constructor(props){
            super(props);

        }
        
        render(){
            return(
                <article className="col-sm-4">
                    <div className="img-container clearfix">
                        <a href={this.props.post_data.link}>
                             {
                                (this.props.post_data.featured_image != "") ? (
                                    <img src={this.props.post_data.featured_image}/>
                                ):(
                                    <div className="no-img">
                                        <h3>
                                            Read More
                                        </h3>
                                    </div>
                                )
                             }
                            
                        </a>
                    </div>
                    <div className="blog-item-content">
                        <span className="blog-item-content-row title clearfix">
                            <a href={this.props.post_data.link} rel="bookmark"><h3 dangerouslySetInnerHTML = {{__html:this.props.post_data.title.rendered}}/></a>
                        </span>
                        <span className="blog-item-content-row desc clearfix" dangerouslySetInnerHTML = {{__html:this.props.post_data.excerpt.rendered}}/>
                        <a className="blog-item-link-button" href={this.props.post_data.link}></a>
                    </div>
                </article>
            );
        }
    }
    
    class CategoryDropdown extends React.Component{
        constructor(props){
            super(props);
        }
        
        change(event){
            let root_url = "http://localhost:3001/marketingacumen/index.php/"    
            let category_url = root_url + "wp-json/wp/v2/posts/?filter[category_name]=" +  event.target.value;
            
            console.log(category_url);
            
            //Fetch all posts from Rest API ++++
            fetch(category_url)
            .then((res) => {
                return res.json();
            }).then((data)=>{
                ReactDOM.render(<div/>, document.getElementById('blog-area'));
                ReactDOM.render(<Posts posts_data={data}/>, document.getElementById('blog-area'));
            })
            .catch((err)=>{
                console.log(err);
            });
        }
        
        render(){
             return(
                <select onChange={this.change} className="category-dropdown">
                    <option value="">All</option>
                    {
                        this.props.categories.filter(c => c.name != "TEMPLATE ElEMENT").map(cat => <option key={cat.id} dangerouslySetInnerHTML = {{__html:cat.name}} value={cat.slug}/>)
                    }
                </select>
             );
        }
    }
  
    let root_url = "http://localhost:3001/marketingacumen/index.php/"    
    let post_url = root_url + "wp-json/wp/v2/posts";
    let category_url = root_url + "wp-json/wp/v2/categories"
        
    
    //Fetch all posts from Rest API ++++
    fetch(post_url)
    .then((res) => {
        return res.json();
    }).then((data)=>{
        ReactDOM.render(<Posts posts_data={data}/>, document.getElementById('blog-area'));
    })
    .catch((err)=>{
        console.log(err);
    });
    
    //Fetch all categories from Rest API +++++
    fetch(category_url)
    .then((res)=>{
        return res.json();
    }).then((data)=>{
        ReactDOM.render(<CategoryDropdown categories={data}/>, document.getElementById('category-dropdown'));
    })
    .catch((err)=>{
        console.log(err);
    });
    
</script>-->
<script>
    "use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Posts = function (_React$Component) {
    _inherits(Posts, _React$Component);

    function Posts(props) {
        _classCallCheck(this, Posts);

        var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(Posts).call(this, props));

        _this.state = { "posts": _this.props.posts_data };
        return _this;
    }

    _createClass(Posts, [{
        key: "changeState",
        value: function changeState(posts) {
            this.setState({ posts: posts });
        }
    }, {
        key: "render",
        value: function render() {
            return React.createElement(
                "div",
                null,
                this.state.posts.map(function (post) {
                    return React.createElement(Post, { post_data: post, key: post.id });
                })
            );
        }
    }]);

    return Posts;
}(React.Component);

var Post = function (_React$Component2) {
    _inherits(Post, _React$Component2);

    function Post(props) {
        _classCallCheck(this, Post);

        return _possibleConstructorReturn(this, Object.getPrototypeOf(Post).call(this, props));
    }

    _createClass(Post, [{
        key: "render",
        value: function render() {
            return React.createElement(
                "article",
                { className: "col-sm-4" },
                React.createElement(
                    "div",
                    { className: "img-container clearfix" },
                    React.createElement(
                        "a",
                        { href: this.props.post_data.link },
                        this.props.post_data.featured_image != "" ? React.createElement("img", { src: this.props.post_data.featured_image }) : React.createElement(
                            "div",
                            { className: "no-img" },
                            React.createElement(
                                "h3",
                                null,
                                "Read More"
                            )
                        )
                    )
                ),
                React.createElement(
                    "div",
                    { className: "blog-item-content" },
                    React.createElement(
                        "span",
                        { className: "blog-item-content-row title clearfix" },
                        React.createElement(
                            "a",
                            { href: this.props.post_data.link, rel: "bookmark" },
                            React.createElement("h3", { dangerouslySetInnerHTML: { __html: this.props.post_data.title.rendered } })
                        )
                    ),
                    React.createElement("span", { className: "blog-item-content-row desc clearfix", dangerouslySetInnerHTML: { __html: this.props.post_data.excerpt.rendered } }),
                    React.createElement("a", { className: "blog-item-link-button", href: this.props.post_data.link })
                )
            );
        }
    }]);

    return Post;
}(React.Component);

var CategoryDropdown = function (_React$Component3) {
    _inherits(CategoryDropdown, _React$Component3);

    function CategoryDropdown(props) {
        _classCallCheck(this, CategoryDropdown);

        return _possibleConstructorReturn(this, Object.getPrototypeOf(CategoryDropdown).call(this, props));
    }

    _createClass(CategoryDropdown, [{
        key: "change",
        value: function change(event) {
            var root_url = "<?php bloginfo('url'); ?>";
            var category_url = root_url + "wp-json/wp/v2/posts/?filter[category_name]=" + event.target.value;

            console.log(category_url);

            //Fetch all posts from Rest API ++++
            $.ajax({
                url: category_url
            }).then(function(data) {
                ReactDOM.render(React.createElement("div", null), document.getElementById('blog-area'));
                ReactDOM.render(React.createElement(Posts, { posts_data: data }), document.getElementById('blog-area'));
            });
                   
        }
    }, {
        key: "render",
        value: function render() {
            return React.createElement(
                "select",
                { onChange: this.change, className: "category-dropdown" },
                React.createElement(
                    "option",
                    { value: "" },
                    "All"
                ),
                this.props.categories.filter(function (c) {
                    return c.name != "TEMPLATE ElEMENT";
                }).map(function (cat) {
                    return React.createElement("option", { key: cat.id, dangerouslySetInnerHTML: { __html: cat.name }, value: cat.slug });
                })
            );
        }
    }]);

    return CategoryDropdown;
}(React.Component);

//var root_url = "http://localhost:3001/marketingacumen/index.php/";
var root_url = "<?php bloginfo('url'); ?>";
var post_url = root_url + "wp-json/wp/v2/posts";
var category_url = root_url + "wp-json/wp/v2/categories";

$(document).ready(function() {
    $.ajax({
        url: post_url
    }).then(function(data) {
       ReactDOM.render(React.createElement(Posts, { posts_data: data }), document.getElementById('blog-area'));
    });
    
    $.ajax({
        url: category_url
    }).then(function(data) {
       ReactDOM.render(React.createElement(CategoryDropdown, { categories: data }), document.getElementById('category-dropdown'));
    });
});

/*
//Fetch all posts from Rest API ++++ Not working in safari
fetch(post_url).then(function (res) {
    return res.json();
}).then(function (data) {
    ReactDOM.render(React.createElement(Posts, { posts_data: data }), document.getElementById('blog-area'));
}).catch(function (err) {
    console.log(err);
});

//Fetch all categories from Rest API +++++
fetch(category_url).then(function (res) {
    return res.json();
}).then(function (data) {
    ReactDOM.render(React.createElement(CategoryDropdown, { categories: data }), document.getElementById('category-dropdown'));
}).catch(function (err) {
    console.log(err);
});*/
</script>

<?php get_footer(); ?>