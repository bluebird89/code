package tdd;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class FizzBuzzTest {

    @Test
    public void should_return_origin_digit_given_input_is_not_match_any_rule() {

        String actual = FizzBuzz.handleSingleDigit357(4);
        assertEquals("", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_3() {
        String actual = FizzBuzz.handleSingleDigit357(12);
        assertEquals("Fizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_5() {
        String actual = FizzBuzz.handleSingleDigit357(20);
        assertEquals("Buzz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_3_and_5() {
        String actual = FizzBuzz.handleSingleDigit357(15);
        assertEquals("FizzBuzz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_7() {
        String actual = FizzBuzz.handleSingleDigit357(77);
        assertEquals("Whizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_3_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(21);
        assertEquals("FizzWhizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_include_3_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(37);
        assertEquals("FizzWhizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_5_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(70);
        assertEquals("BuzzWhizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_include_5_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(571);
        assertEquals("BuzzWhizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_divided_5_and_3_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(105);
        assertEquals("FizzBuzzWhizz", actual);
    }

    @Test
    public void should_return_Fizz_given_input_can_be_include_5_and_3_and_7() {
        String actual = FizzBuzz.handleSingleDigit357(537);
        assertEquals("FizzBuzzWhizz", actual);
    }
}
