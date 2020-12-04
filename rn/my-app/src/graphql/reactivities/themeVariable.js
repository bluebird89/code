import { gql, makeVar } from "@apollo/client";

export const darkMode = makeVar(false);

// This is the query to get the darkMode reactive variable.
export const GET_DARK_MODE = gql`
  query getDarkMode{
    darkMode @client
  }
`
