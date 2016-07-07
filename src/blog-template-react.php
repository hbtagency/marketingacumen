<?php
/*
* Template Name: Blog React Template
*/
get_header(); ?>

<script src="https://fb.me/react-15.2.0.js"></script>
<script src="https://fb.me/react-dom-15.2.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>

  <div class="wrap-content container general-content">
    <div class="site-content">
      <section id="primary" class="content-area col-xs-12">
        <main id="main" class="site-main">
         <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php //post_class(); ?> role="article">
              <header class="entry-header">
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
        <?php voidx_post_navigation(); ?>
      </section>
      
      
      <section id="blog-area" class="blog-area">
                
      </section>     
    </div>

  </div>


<!--dangerouslySetInnerHTML={{__html: post.content.rendered} } -->
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
                            <img src={this.props.post_data.featured_image}/>
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
    
</script>


<?php get_footer(); ?>