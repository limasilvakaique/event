import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import EventListScreen from './screens/EventListScreen';
import RsvpFormScreen from './screens/RsvpFormScreen';

const Stack = createStackNavigator();

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Eventos" component={EventListScreen} />
        <Stack.Screen name="RsvpForm" component={RsvpFormScreen} options={{ title: 'Confirmar Presença' }} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
