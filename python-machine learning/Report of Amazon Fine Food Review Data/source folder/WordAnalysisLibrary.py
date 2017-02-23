#Word Analysis Library

import nltk
from nltk.tokenize import RegexpTokenizer
from nltk.corpus import stopwords

#################################################
#Clean String and Get Word Analysis Result
#################################################
def word_analysis(all_summary):
    #w means tokens are made of only alphanumeric characters where + indicates that they comprise of one or more of such characters
    tokenizer = RegexpTokenizer('\w+')

    #get all words
    tokenized_summary = tokenizer.tokenize(all_summary)

    #lower words
    lower_summary = [ word.lower() for word in tokenized_summary]
    #print lower_summary[0:10]

    #lemmatize words
    lemmatizer = nltk.WordNetLemmatizer()
    lemmatizer_summary = [lemmatizer.lemmatize(repr(t).decode("utf-8").replace('\'', '')).encode("ascii") for t in lower_summary]
    #print len(lemmatizer_summary)
    #print lemmatizer_summary[:10]

    text_summary= nltk.Text(lemmatizer_summary)
    #print len(text_summary)
    #print text_summary[:10]

    #remove stopwords
    stopwords1 = nltk.corpus.stopwords.words('english')
    valid_summary = [word for word in text_summary if word not in stopwords1]

    valid_text = nltk.Text(valid_summary)
    return valid_text
