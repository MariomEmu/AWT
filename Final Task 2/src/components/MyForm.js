
import React, { Component } from "react";

class MyForm extends Component {
      render(){
          return(
            <form className="ui form" >
                <div className="fields">
                    <div className="four wide field">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="First Name" />
                    </div>

                    <div className="four wide field">
                    <label>Last Name</label>
                  <input type="text" name="last_name" placeholder="Last Name" />
                    </div>
                    
                    <div className="four wide field">
                     <label>E-mail</label>
                    <input type="email" name="email" placeholder="emu@gmail.com" />
                    </div>

                  
             <div className="four wide field">
             <button className="ui primary button submit-button">Save</button>
                    </div>

                </div>
            </form>
          ); 
      }
}
export default MyForm;
