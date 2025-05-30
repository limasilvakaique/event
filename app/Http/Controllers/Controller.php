<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import EventListScreen from './screens/EventListScreen';
import RsvpFormScreen from './screens/RsvpFormScreen';

const Stack = createStackNavigator();

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="EventList">
        <Stack.Screen
          name="EventList"
          component={EventListScreen}
          options={{ title: 'Lista de Eventos' }}
        />
        <Stack.Screen
          name="RsvpForm"
          component={RsvpFormScreen}
          options={{ title: 'Confirmação de Presença' }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
