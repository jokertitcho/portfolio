
import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import HomePage from "./componants/HomePage"
import Contact from "./componants/Contact"


function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<HomePage/>} />
          <Route path='/contact' element={<Contact/>}/>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
