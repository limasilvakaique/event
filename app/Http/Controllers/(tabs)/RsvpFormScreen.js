import React from 'react';
import { View, Text, Button } from 'react-native';

const RsvpFormScreen = ({ navigation }) => {
  return (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
      <Text>📝 Formulário de RSVP</Text>
      <Button title="Voltar para eventos" onPress={() => navigation.goBack()} />
    </View>
  );
};

export default RsvpFormScreen;
