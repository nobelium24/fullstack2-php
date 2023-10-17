import React from 'react'
import { useState } from 'react'
import axios from "axios"

const App = () => {
  const [firstName, setFirstName] = useState("")
  const [lastName, setLastName] = useState("")
  const [email, setEmail] = useState("")
  const [password, setPassword] = useState("")

  const uri = "http://localhost/fullstack2/backend/signup.php"
  const submit = () => {
    const data = {
      firstName: firstName,
      lastName: lastName,
      email: email,
      password: password
    }
    axios.post(uri, data, {
      headers: {
        "Content-Type": "application/json",
        "Allow-Control-Allow-Origin": "*"
      }
    }).then((response) => {
      console.log(response)
      alert(response.data.message)
    }).catch((error) => {
      console.log(error)
    })
  }
  return (
    <>
      <div className='container mx-auto card shadow-lg p-5'>
        <h6 className='text-center text-muted display-6'>Sign up</h6>
        <input type="text" className="form-control mb-3" onChange={(e) => setFirstName(e.target.value)} />
        <input type="text" className="form-control mb-3" onChange={(e) => setLastName(e.target.value)} />
        <input type="text" className="form-control mb-3" onChange={(e) => setEmail(e.target.value)} />
        <input type="text" className="form-control mb-3" onChange={(e) => setPassword(e.target.value)} />
        <button className='btn btn-dark' onClick={submit}>Sign up</button>
      </div>
    </>
  )
}

export default App
