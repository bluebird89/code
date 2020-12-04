import { useQuery } from '@apollo/client';
import React from 'react';
import ButtonComponent from '../components/button.jsx';
import { GET_DARK_MODE } from '../graphql/reactivities/themeVariable';

const LandingPage = () => {
  const { loading, error, data } = useQuery(GET_DARK_MODE);
  return (
    <div style={{ height: '100vh', backgroundColor: data.darkMode ? 'black' : 'white', color: data.darkMode ? 'white' : 'black' }}>
      <h1>Welcome to Theme Toggle Appliation!</h1>
      <ButtonComponent />
    </div>
  )
}

export default LandingPage
