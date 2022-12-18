import React from 'react';
import axios from 'axios';
 
class App extends React.Component {
  state = {
    name: '',
    email: '',
    country: '',
    city: '',
    job: '',
    contacts: []
  }
 
  componentDidMount() {
    const url = 'http://localhost/devtest/reactjs/contacts.php/'
    axios.get(url).then(response => response.data)
    .then((data) => {
      this.setState({ contacts: data })
      console.log(this.state.contacts)
     })
  }
 
  handleFormSubmit( event ) {
      event.preventDefault();
 
      let formData = new FormData();
      formData.append('name', this.state.name)
      formData.append('email', this.state.email)
      formData.append('city', this.state.city)
      formData.append('country', this.state.country)
      formData.append('job', this.state.job)
 
      axios({
          method: 'post',
          url: 'http://localhost/devtest/reactjs/contacts.php/',
          data: formData,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then(function (response) {
          //handle success
          console.log(response)
          alert('New Contact Successfully Added.');  
      })
      .catch(function (response) {
          //handle error
          console.log(response)
      });
  }
 
  render() {
    return (
      <div className="container">
        <h1 className="page-header text-center">Contact Management</h1>
         
        <div className="col-md-4">
            <div className="panel panel-primary">
                <div className="panel-heading"><span className="glyphicon glyphicon-user"></span> Add New Contact</div>
                <div className="panel-body">
                <form>
                <label>Name</label>
                <input type="text" name="name" className="form-control" value={this.state.name} onChange={e => this.setState({ name: e.target.value })}/>
 
                <label>Email</label>
                <input type="email" name="email" className="form-control" value={this.state.email} onChange={e => this.setState({ email: e.target.value })}/>
 
                <label>Country</label>
                <input type="text" name="country" className="form-control" value={this.state.country} onChange={e => this.setState({ country: e.target.value })}/>
 
                <label>City</label>
                <input type="text" name="city" className="form-control" value={this.state.city} onChange={e => this.setState({ city: e.target.value })}/>
 
                <label>Job</label>
                <input type="text" name="job" className="form-control" value={this.state.job} onChange={e => this.setState({ job: e.target.value })}/>
                <br/>
                <input type="submit" className="btn btn-primary btn-block" onClick={e => this.handleFormSubmit(e)} value="Create Contact" />
            </form>
                </div>
            </div>
        </div>
 
        <div className="col-md-8">  
        <h3>Contact Table</h3>
        <table className="table table-bordered table-striped">
        <thead>  
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>City</th>
            <th>Job</th>     
        </tr>
        </thead>
        <tbody>
        {this.state.contacts.map((contact, index) => (
        <tr key={index}>
            <td>{ contact.name }</td>
            <td>{ contact.email }</td>
            <td>{ contact.country }</td>
            <td>{ contact.city }</td>
            <td>{ contact.job }</td>
        </tr>
        ))}
        </tbody>
        </table>
         </div>  
 
        </div>
    );
  }
}
export default App;