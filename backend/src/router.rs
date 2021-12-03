#![allow(unused_imports)]
#![allow(unused_attributes)]
#[macro_use] 

use rocket::response::content;

pub mod index {

    use rocket_dyn_templates::Template;
    use std::collections::HashMap;
    extern crate rocket;
    use rocket::http::CookieJar;
    use rocket::response::status;
    use rocket::form::Form;

    #[derive(FromForm)]
    pub struct IndexPost {
        _callback: String
    }

    #[post("/", data = "<input>")]
    pub fn index(cookies: &CookieJar<'_>, input: Form<IndexPost>) -> Result<Template, status::NotFound<String>> {

        let mut context: HashMap<&str, &str> = HashMap::new();

        if input._callback.is_empty() {
            status::Accepted(Some(String::from("[CZ/SK] Systém se posral")));
        }

        context.insert("callback", &input._callback);

        Ok(Template::render("index", &context))

    }

}

// CRUD model

pub mod api {


}