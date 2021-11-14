#![allow(unused_imports)]
#[macro_use] 

use rocket::response::content;

pub mod index {

    use rocket_dyn_templates::Template;
    use std::collections::HashMap;

    #[get("/")]
    pub fn index() -> Template {
        let context: HashMap<&str, &str> = HashMap::new();
        Template::render("index", &context)
    }

    #[get("/login")]
    pub fn login() -> &'static str { 
        "index page"
    }

}

// CRUD model

pub mod api {

    // Create new instance of a session 
    #[get("/create")]
    pub fn create() -> &'static str { 
        "create"
    }

    // Read instance of a session 
    #[get("/read")]
    pub fn read() -> &'static str {
        "read"
    }

    // Update selected instance of a session 
    #[get("/update")]
    pub fn update() -> &'static str { 
        "update"
    }

    // Delete selected instance of a session 
    #[get("/delete")]
    pub fn delete() -> &'static str { 
        "delete"
    }

}